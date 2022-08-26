const { promises: fs } = require("fs")
const zipdir = require('zip-dir')
const path = require("path")
const del = require('del')


async function copyDir(src, dest) {
    await fs.mkdir(dest, { recursive: true });
    let entries = await fs.readdir(src, { withFileTypes: true });
	let ignore = [
		'node_modules',
		'dist',
		'src',
		'.git',
		'.github',
		'.browserslistrc',
		'.editorconfig',
		'.gitattributes',
		'.gitignore',
		'.jscsrc',
		'.jshintignore',
		'.travis.yml',
		'composer.json',
		'composer.lock',
		'package.json',
		'package-lock.json',
		'phpcs.xml.dist',
		'.vscode'
	];

    for (let entry of entries) {
		if ( ignore.indexOf( entry.name ) != -1 ) {
			continue;
		}
        let srcPath = path.join(src, entry.name);
        let destPath = path.join(dest, entry.name);

        entry.isDirectory() ?
            await copyDir(srcPath, destPath) :
            await fs.copyFile(srcPath, destPath);
    }
}
del('./dist').then (() => {
	console.log('./dist is deleted!');
	copyDir('./', './dist/sweetweb/sweetweb').then (() => {
		zipdir('./dist/sweetweb', { saveTo: './dist/sweetweb.zip' });
		console.log('Zip file created');
	});
});
