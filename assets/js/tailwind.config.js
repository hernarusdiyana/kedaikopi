/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./application/views/**/*.php",
		"../../application/**/*.php",
		"../../application/views/*/*.php",
		"../../application/views/**/*.php",
		"../../application/views/*.php",

		"./application/views/admin/*.php",
		"../../application/admin/*.php",
		"./node_modules/flowbite/**/*.js",
		"../node_modules/flowbite/**/*.js",
		"../../node_modules/flowbite/**/*.js",

		// "/application/views/*/*.php",
		// "/application/views/**/*.php",
		// "/application/views/*/*.js",
		// "/application/views/**/*.js",
	],
	theme: {
		container: {
			center: true,
		},
		extend: {},
	},
	plugins: [
		require('@tailwindcss/forms'),
		require('flowbite/plugin'),
	],
};
