# Bless: Open-source Map-powered Simple Homeless Management Information System (HMIS) 

Bless System allows you to automate and manage food distribution to homeless people, by creating groups consisting of admins (One or more) and food servers (Those who prepare food and deliver it to homeless). On the system, you can store locations on map to indicate the number of people in each area so that the route to cover them and the number of needed meals can be easily calculated.

# How to get it up and running locally?
Easiest way to do so is using docker directly, attached to this project a sample docker compose file that connects nginx, php and MariaDB.

First, make sure you setup an .env file. 

Install depencencies for composer:
```
composer install
```

To run migrations and seeder: 
```
php artisan migrate --seed
```

To import sample user:
```
php artisan 
```

To Generate a key (APP_KEY):  
```
php artisan key:generate
```
To run locally, Shell into bless-php image and run the follwing command: 
```
php artisan serve --host 0.0.0.0
```

Then in the browser go to: 
```
localhost:8000
```

Login using credentials
Username: bless@titrias.com
Password: password
# Why PHP?

As this is originally created for NGOs, which might have problem hosting on a pricey service, we decided to go with PHP so it can be used on cheap shared hosting, we don't recommend running it on shared hosting though. 

# Roles:
Each user is only part of a single group. 
Admin: Can add new groups as well as manage his groups. (Not implemented)
Leader: The leader can manage his group. 
D
# Possible enahncements
The system is created with expansion in mind, possible enhancements: 
- Implement the Admin role to manage all groups and add new ones. 
- Currently the system supports a single group to get the system shipped faster to the NGO, but with the help of the admin role and new screens this behavior can be implemented. 

Bless system was created as part of [TiTrias's 2023 NGO initiative](https://titrias.com/free-ngo-websites-in-2023/)
For system description and how to  [Bless: Open-source Map-powered Simple Homeless Management Information System (HMIS)](https://titrias.com/bless-open-source-map-powered-simple-homeless-management-information-system-hmis/)
