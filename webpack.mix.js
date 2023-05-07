const mix = require('laravel-mix');
const fs = require('fs');
mix.browserSync('localhost/resume/public')


// main

// -- js
fs.readdirSync('resources/js/').map((filename)=>{
    mix.js(`resources/js/${filename}`,'public/js/app.js')
})

// -- scss
fs.readdirSync('./resources/scss/').map((filename)=>{
    mix.sass(`./resources/scss/${filename}`,'public/css/app.css')
})

// -- css
fs.readdirSync('./resources/css/').map((filename)=>{
    mix.css(`./resources/css/${filename}`,'public/css/app.css')
})





// admin

fs.readdirSync('public/admin/js/').map((filename)=>{
    mix.js(`public/admin/js/${filename}`,'public/admin/main/app.js')
})

fs.readdirSync('public/admin/css/').map((filename)=>{
    mix.css(`public/admin/css/${filename}`,'public/admin/main/app.css').options({
        processCssUrls: false
    })
})

