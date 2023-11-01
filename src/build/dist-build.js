const { promises: fs } = require("fs");
const zipdir = require("zip-dir");
const path = require("path");
const del = require("del");

async function copyDir(src, dest) {
	await fs.mkdir(dest, { recursive: true });
	let entries = await fs.readdir(src, { withFileTypes: true });
	let ignore = [
		"node_modules",
		"dist",
		"src",
		".git",
		".github",
		".browserslistrc",
		".editorconfig",
		".gitattributes",
		".gitignore",
		".vscode",
		".jscsrc",
		".jshintignore",
		".travis.yml",
		"composer.json",
		"composer.lock",
		"package.json",
		"package-lock.json",
		"phpcs.xml.dist",
		".vscode",
	];

	for (let entry of entries) {
		if (ignore.indexOf(entry.name) != -1) {
			continue;
		}
		let srcPath = path.join(src, entry.name);
		let destPath = path.join(dest, entry.name);

		entry.isDirectory()
			? await copyDir(srcPath, destPath)
			: await fs.copyFile(srcPath, destPath);
	}
}

async function setLineEndings(filePath, newLineEnding) {
	const fileContent = await fs.readFile(filePath, "utf8");
	const contentWithNewLineEnding = fileContent.replace(/\r?\n/g, newLineEnding);
	await fs.writeFile(filePath, contentWithNewLineEnding, "utf8");
}

async function buildAndZip() {
	del("./dist").then(async () => {
		console.log("./dist is deleted!");
		copyDir("./", "./dist/wsstheme/wsstheme").then(async () => {
			// Set the desired line ending, e.g., "\n" for LF
			await setLineEndings("./dist/wsstheme/wsstheme/js/theme.js", "\n");
			zipdir("./dist/wsstheme", { saveTo: "./dist/wsstheme.zip" });
			console.log("Zip file created");
		});
	});
}

buildAndZip();
