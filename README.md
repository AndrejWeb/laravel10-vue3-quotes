<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a>
<a href="https://vuejs.org/" target="_blank"><img src="https://i.imgur.com/6Xin2Q6.png" alt="Vue Logo" /></a></p>

## Laravel 10 - Vue 3 Quotes Management

App built with Laravel 10 and Vue 3 to demonstrate Laravel & Vue combo in action. API for CRUD operations created with Laravel and Vue 3 is used to get / create / update / delete data in the UI. For this purpose Vue communicates with the API.
<img src="https://i.imgur.com/YLjsgoL.jpg" />
<img src="https://i.imgur.com/6ty2ZJy.jpg" />
<img src="https://i.imgur.com/KYvpEG8.jpg" />
<img src="https://i.imgur.com/v5qLVNc.jpg" />

### Running the app
Download or git clone the repository and follow these steps

1. Copy .env.example in the same directory and rename it to `.env`. Enter your database credentials in this file.
2. Run `composer install` in project's root directory via terminal
3. Run `npm install` in project's root directory via terminal
4. Run `php artisan migrate` or `php artisan migrate && php artisan db:seed` if you want to get 20 quotes added in your database via `QuoteSeeder`
5. If necessary modify the port server for Vue 3 in `vite.config.js` in this section if you want different port

`server: {
port: 3000,
}`

6. If necessary modify `API_URL` located in `resources/js/config/config.js`
7. Run `php artisan serve` in project's root directory via terminal
8. Open a new terminal and run `npm run dev` in project's root directory
9. Your application should be ready at `http://localhost:8000` or different URL in case you changed `APP_URL` in `.env`

If you have issues running the app you can contact me via <a href="https://aaweb.tech" target="_blank">https://aaweb.tech</a>
