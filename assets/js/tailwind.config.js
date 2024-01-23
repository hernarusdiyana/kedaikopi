/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./application/views/**/*.php",
		"../../application/**/*.php",
		"../../application/views/*/*.php",
		"../../application/views/**/*.php",
		"../../application/views/*.php",

		// "/application/views/*/*.php",
		// "/application/views/**/*.php",
		// "/application/views/*/*.js",
		// "/application/views/**/*.js",
	],
	theme: {
		extend: {},
	},
	plugins: [],
};
