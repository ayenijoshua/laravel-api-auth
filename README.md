

## About
This a simple laravel passport api testing. 
This application is hosted on a Digital Ocean Ubuntu server (http://206.189.115.179). You can get a list of users at (http://206.189.115.179/api/users). The other endpoints are described below (Live server endpoints) section

Steps to create this locally (You need to have PHP,composer and Mysql install on your machine)

- [Clone repo from](https://github.com/ayenijoshua/laravel-api-auth.git).
- Run composer install
- Create a database and Configure your .env file
- Run php artisan migrate, to migrate your database tables
- Run php artisan passport:install, to install passport
- Run php artisan test --env=testing, to run your tests

## Authentication Bearer token
eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMGVhMjY2MDQ0OGViZjZhNDE0NWFjZWNiNDM1OThlODIyODY4YmE0OGFmN2UyODNkMDIyYzRiYjcxOWE1NjY0ZWRjNDFmNDI3M2M4MDUzNjEiLCJpYXQiOjE2NDE2NTYzNDUuODExMzQ5LCJuYmYiOjE2NDE2NTYzNDUuODExMzUxLCJleHAiOjE2NzMxOTIzNDUuODA4MjM3LCJzdWIiOiIyIiwic2NvcGVzIjpbXX0.UK078BTLXe6Z-mmudhzMgfqulvUf9mNe9WTB4n5cKIj4VTNLeYsw8btan5BOKye5XW0J6K4Q2f2nfSiEeykuB7RIK9K8_Whe7mUzjfqxMmPwL-xrgXxVL0ddaSq7Pq0tEK7ru1Yjr0rKecfWs2wmYu_dstWGxQnLp104k4dLlTIMkBTY7deCgWrklEi9nU_tQGqbSzAAIZ6SN9XoqDrvMertQ4yMtdNdGeuBNAydQd2QInKGP3C7ukJg3YmZi1dI3T7o1CClrVHC-bu2o1XoYd4FRCFSf9FJTcLPAbvIdVnt4auP4BKWszqRJerp1Rb7rLP822OTtvpIRpQ85_Ev86bsA6BklvPQ0X-3ntVQ_dtgrJNnB9N4R30e25p9T_2iwKswPmYnT_fduxSFlqeynYAT7gF0PwsAThjjnIqIBzvYQYAxreYMr6DA19x8G5wK77-QekVkey-4ozUjI9LOtucSoHEzvVgYa2GwiWFjd3kaxcAKAv3uCA2sE3XvsSWl4bbLRMz_zazmUuKz0_oZQPGWi3zAM0oRr9k09X5DkikyeihDAOlBUlsyd7CrRvrGYszGR4XuhcdUIqGoPYcUywwvjpSt_auBcbdLdZPC_OHFCvMvoE6wDUc0bcN_N7JNV6JmTVNREvArMT4eA8pVQbL2Kahs7a2Cw5CdywBNKM8
## Endpoints on Live server
T
# Authenticate user
    curl --location --request PUT 'http://206.189.115.179/api/auth' \
    --header 'Content-Type: application/json' \
    --data-raw '{
        "email": "user@mail.com",
        "password": 'password'
    }'

# Register user
    curl --location --request PUT 'http://206.189.115.179/api/register' \
    --header 'Content-Type: application/json' \
    --data-raw '{
        "name":'John',
        "phone":'090094'
        "email": "user@mail.com",
        "password": 'password'
    }'


   # Get users
    curl --location --request PUT 'http://206.189.115.179/api/users/' \
    --header 'Content-Type: application/json' \
             'Authorization Bearer: token' \ 

# Update user
    curl --location --request PUT 'http://206.189.115.179/api/users/{id}/update' \
    --header 'Content-Type: application/json' \
             'Authorization Bearer: token' \
    --data-raw '{
        "name": "kareem",
    }'

