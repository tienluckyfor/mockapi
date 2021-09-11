const puppeteer = require('puppeteer');
const sleep = require("sleep-promise");
const {Url} = require("./Url");
const {File} = require("./File");

const start = new Date();

function time() {
    return ((new Date() - start) / 1000).toFixed(2) + 's';
}

class Devices {
    static urlToName(url) {
        let Url = url.replace(/https/g, 'http');
        Url = Url.replace(/www\./g, '');
        Url = Url.replace(/\W/g, '');
        // return `${Url}.png`;
        return Url;
    }

    static imageNames(url, targetPath = null, req = null) {
        let obj = {};
        this.list().map((item) => {
            const imageName = `${this.urlToName(url)}-${this.urlToName(item.name)}.png`;
            const imageUrl = req ? `${Url.baseUrl(req, '/images/screenshots')}/${imageName}` : ``;
            const imageSharp = req ? `${Url.baseUrl(req, '/imageSharp/screenshots')}/${imageName}` : ``;
            const imagePath = `${targetPath}/screenshots/${imageName}`;
            obj[item.name] = {imageName, imagePath, imageUrl, imageSharp}
        })
        return {obj, arr: Object.values(obj)};
    }

    static list() {
        const desktopDevice = {
            name: 'Laptop',
            userAgent:
                'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.83 Safari/537.36',
            viewport: {
                width: 1440,
                height: 900,
                deviceScaleFactor: 1,
                isMobile: false,
                hasTouch: false,
                isLandscape: false,
            },
        };
        return [
            desktopDevice,
            puppeteer.devices['iPad'],
            puppeteer.devices['iPad landscape'],
            puppeteer.devices['iPhone 7'],
            puppeteer.devices['iPhone 7 landscape'],
        ];
    }
}

class Screenshot {
    static async takePhoto(url, targetPath) {
        console.info(`[${time()}] Starting automated screenshot production for ${Devices.list().length} devices`);

        const browser = await puppeteer.launch({
            headless: true, // Set to false while development
            defaultViewport: null,
            args: [
                '--disable-setuid-sandbox',
                '--disable-web-security',
                '--no-sandbox',
                '--start-maximized', // Start in maximized state
            ],
        });
        const page = await browser.newPage();
        console.info(`[${time()}] Open browser at ${url}, wait for network loading...`);

        await page.goto(url, {
            waitUntil: ['networkidle0'],
            timeout: 0
        });
        console.info(`[${time()}] domcontentloaded and networkidle0.`);

        let imageNames = Devices.imageNames(url, targetPath);
        for (const device of Devices.list()) {
            const {imagePath} = imageNames.obj[device.name]
            console.info(
                `[${time()}] Making initialView screenshot for device ${device.name}: ${imagePath}`,
            );
            await page.emulate(device);
            const bodyHeight = await page.evaluate(() => document.body.scrollHeight);
            const height = bodyHeight > device.viewport.height ? bodyHeight : device.viewport.height
            await page.setViewport({
                width: device.viewport.width,
                height
            });
            await sleep(3000);
            await page.screenshot({path: imagePath});
        }

        await page.close();
        await browser.close();
    }

    static async imageFiles(targetPath, req, url) {
        let fileList = [];
        let imageNames = Devices.imageNames(url, targetPath, req);
        let devices = Devices.list()
        await Object.entries(imageNames.obj).map(async ([key, item], i) => {
            if (await File.exists(item.imagePath)) {
                fileList.push({
                    "device": devices
                        .filter(item => item.name == key)
                        .map(item => {
                            return {name: item.name, width: item.viewport.width, height: item.viewport.height}
                        })[0],
                    "imageUrl": item.imageUrl,
                    "imageSharp": item.imageSharp
                })
            }
        })
        if (fileList.length > 0)
            return {
                "status": 200,
                "data": fileList
            }
        return {
            "status": 400,
            message: `URL is not online: ${url}`
        }
    }
}

module.exports = {Screenshot}