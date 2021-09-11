const puppeteer = require('puppeteer');
const sleep = require("sleep-promise");
const {Url} = require("./Url");
const {File} = require("./File");

class Screenshot {
    static async takePhoto(url, path) {
        const browser = await puppeteer.launch({
            headless: true, // Set to false while development
            defaultViewport: null,
            args: [
                '--no-sandbox',
                '--start-maximized', // Start in maximized state
            ],
        });
        const page = await browser.newPage();
        await page.goto(url, {
            waitUntil: 'networkidle0', timeout: 0
        });
        // Get scroll width and height of the rendered page and set viewport
        const bodyWidth = await page.evaluate(() => document.body.scrollWidth);
        const bodyHeight = await page.evaluate(() => document.body.scrollHeight);
        await page.setViewport({width: bodyWidth, height: bodyHeight});
        await sleep(3000);
        await page.screenshot({path});

        await page.close();
        await browser.close();
    }

    static imageName(url) {
        let Url = url.replace(/https/g, 'http');
        Url = Url.replace(/www\./g, '');
        Url = Url.replace(/\W/g, '');
        return `${Url}.png`;
    }

    static async imageFile(targetPath, req, url) {
        if (await File.exists(targetPath)) {
            return {
                "status": 200,
                "data": {
                    "url": url,
                    "imageUrl": Url.baseUrl(req, '/images/') + this.imageName(url)
                },
            }
        }
        return {
            "status": 400,
            message: `URL is not online: ${url}`
        }
    }
}

module.exports = {Screenshot}