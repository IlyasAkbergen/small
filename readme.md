
1. клонировать проект с git
   git clone https://github.com/IlyasAkbergen/small.git
    
2. скачать необходимые модули для vue js
    npm install
    
3. скомпилировать указанные в webpack.mix.js файлы
    npm run dev
    
4. запустить сервер 
    php artisan serve или поднять на homestead, инструкция <a href="https://laravel.com/docs/5.8/homestead">здесь</a>

5. переимновать файл .env.example в .env, настроить в нем подключение к базе данных. Также настроить почту, она понадобится для отправки письма для подтверждения регистрации.
    
6. создать базу данных.

7. запстить миграции и сидер
    php artisan migrate:fresh --seed

<hr/>  

    Менеджер 
        логин:  manager@small.kz
        пароль: password
    
    Клиент
        логин:  ilijas9813@gmail.com
        пароль: ilyas123
            
