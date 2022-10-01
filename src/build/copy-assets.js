const { promises: fs } = require("fs")
const path = require("path")

async function copyDir(src, dest) {
    await fs.mkdir(dest, { recursive: true });
    let entries = await fs.readdir(src, { withFileTypes: true });

    for (let entry of entries) {
        let srcPath = path.join(src, entry.name);
        let destPath = path.join(dest, entry.name);

        entry.isDirectory() ?
            await copyDir(srcPath, destPath) :
            await fs.copyFile(srcPath, destPath);
    }
}

// Copy all Bootstrap SCSS files.
copyDir('./node_modules/bootstrap/scss', './src/sass/assets/bootstrap');
// Copy glightbox postcss directory
copyDir('./node_modules/glightbox/src/postcss', './src/sass/assets/glightbox').then(() => {
    // rename glightbox.css to glightbox.scss
    fs.rename('./src/sass/assets/glightbox/glightbox.css', './src/sass/assets/glightbox/glightbox.scss');
});