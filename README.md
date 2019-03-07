## Wait! What, why Laravel?

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.

## Contributing

Fork this project, do whatever you want!

## How do I get this to work?

Requirements: **PHP 7.1.3** and above

Commands:
<br>
`git clone --recursive https://github.com/InspectorGadget/RTGWebPlayer.git`
<br>
`cp .env.example .env`
<br>
`composer install`
<br>
`npm install`
<br>
`php artisan key:generate`
<br>
`nano .env` and edit the SQL Credentials and save
<br>
`php artisan migrate`
<br>
Done!

If you get any permission errors regarding 'Permission Error' in storage folder, make sure you run `chmod -R 0755`
<br>
<br>
<u>If it still doesn't work, make an issue.</u>
