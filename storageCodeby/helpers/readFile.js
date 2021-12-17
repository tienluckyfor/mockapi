const fs = require('fs');
const Sharp = require('sharp');
const path = require('path');

const resImageByStream = (stream, query, response) => {
    const {w, h, q = 100, f = 'cover', p = 'left top', format = 'webp'} = query
    const width = w ? parseInt(w) : null
    const height = h ? parseInt(h) : null
    const quality = q ? parseInt(q) : null
    const fit = f
    const position = p
    console.log('width, height', width, height)
    const transform = Sharp().resize(width, height, {
        fit,
        position,
    }).toFormat(format, {
        quality: parseInt(quality)
    });
    response.set(`Content-Type`, `image/${format}`);
    stream.pipe(transform).on(`error`, (e) => {
    }).pipe(response);
    return stream;
}

const resImageByPath = (filepath, query, response) => {
    let imagePath = path.join(__dirname, `../${filepath}`)
    if (!fs.existsSync(imagePath)) {
        imagePath = path.join(__dirname, `../public/images/file-not-found.png`)
    }
    const stream = fs.createReadStream(imagePath);
    return resImageByStream(stream, query, response);
}

const resVideoByPath = (filePath, request, response) => {
    // Ensure there is a range given for the video
    const range = request.headers.range ?? '0';
    if (!range) {
        response.status(400).send("Requires Range header");
    }
    // get video stats (about 61MB)
    const videoSize = fs.statSync(filePath).size;
    // Parse Range
    // Example: "bytes=32324-"
    const CHUNK_SIZE = 10 ** 6; // 1MB
    const start = Number(range.replace(/\D/g, ""));
    const end = Math.min(start + CHUNK_SIZE, videoSize - 1);

    // Create headers
    const contentLength = end - start + 1;
    const headers = {
        "Content-Range": `bytes ${start}-${end}/${videoSize}`,
        "Accept-Ranges": "bytes",
        "Content-Length": contentLength,
        "Content-Type": "video/mp4",
    };

    // HTTP Status 206 for Partial Content
    response.writeHead(206, headers);

    // create video read stream for this particular chunk
    const videoStream = fs.createReadStream(filePath, {start, end});

    // Stream the video chunk to the client
    videoStream.pipe(response);
}

const resFileByStream = (stream, response) => {
    response.writeHead(200, {
        "Content-Type": "text/plain; charset=utf-8",
    });
    return stream.pipe(response);
}

const resFileByPath = (filePath, response) => {
    fs.exists(filePath, function (exists) {
        if (exists) {
            const stream = fs.createReadStream(filePath)
            return resFileByStream(stream, response);
        }
        response.writeHead(400, {"Content-Type": "text/plain"});
        response.end("ERROR File does not exist");
    });
}

module.exports = {
    resImageByPath, resImageByStream,
    resVideoByPath,
    resFileByPath, resFileByStream
}