# inv-protection
It's help you to keep safe your inventory

## Requirements
1. PHP >= 8.1
2. Composer
3. Docker

## Installation
1. Clone this: "https://github.com/Klavdius21/inv-protection" to your desktop. If you want to install this project to Windows, I recommend to install project to linux system on wsl.
2. Go to the directory "./inv-protection/laradock" regarding the place where you cloned the project.
3. Copy .env.example to .env and configure it.
4. add inv-protection.loc to hosts
5. Return to the "./inv-protection/laradock" on linux and execute command "docker-compose up php-fpm workspace nginx postgres --build -d".
6. Run "composer install" in workspace container.
7. Run "php artisan key:generate" in workspace container.
8. Copy .env.example to .env and configure it in "./inv-protection/code" directory.
9. Run "php artisan migrate" in workspace container.
10. inv-protection is ready to work. Enjoy.