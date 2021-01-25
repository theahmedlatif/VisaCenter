<p align="center">
<img src="https://i.ibb.co/FKN62gq/Visa-Center.png" align="center">
</p>

<p align="center">
<img src="https://img.shields.io/badge/framework-Laravel%207.0-red" alt="Framework">
<img src="https://img.shields.io/badge/license-MIT-yellowgreen" alt="Framework">
<img src="https://img.shields.io/github/issues/ALatif8/VisaCenter" alt="issues">
<img src="https://img.shields.io/github/forks/ALatif8/VisaCenter" alt="Forks">
<img src="https://img.shields.io/github/stars/ALatif8/VisaCenter" alt="Stars">  
</p>

# Visa Center

This Application is demonstration for managing visa center applicants, in terms of receiving passports and managing visa status (received, pending, rejected or approved).

Routes and functions within this application are accessible based on user roles.

Hosted on AWS: http://ec2-3-134-86-103.us-east-2.compute.amazonaws.com/


## Roles

1. **Dummy**: the default role assigned to a new user, user having this role cannot perform any action.
2. **Front Office**: this role is used to ***receive*** passports from applicants.
3. **Approval Center**: this role can change passport status to ***pending***, ***approved*** or ***rejected*** with comment for status.
4. **Dispatcher**: this role can assign passports to users from approval center and view dashboard.
5. **Admin**: this role can access all functionalities in addition to managing users roles.

## Functions
 
1. **Receive Passport**: a user with the required role can receive a passport from an applicant.
2. **Update Passport Status**: a user with the required role can change passport status from ***received*** to the needed status (***pending***, ***rejected*** or ***approved***) according to the business scenario.
3. **Query**: a user with the required role can query for passports using "received date from" and " received date to" as mandatory fields, in addition to "received by, status and handled by" as optional fields.
4. **My Workspace**:  a user with approval center role can find the passports assigned to him in this view.
5. **My History**: a user with approval center role can find the passports approved or rejected by him in this view.
6. **Passports Dashboard**: a user with dispatcher role can view dashboard for some figures of today and last 30 days.
7. **Manage Users Roles**: a user with admin role can manage roles of other users.
 
## Additional Features
1. **Logs**: changes related to passport actions (assign passport from user to another, change passport status and adding comments) are logged and available to view historical changes. 
2. **Status Control**: status cannot be changed if it was rejected or approved (those are final status unlike received and pending). 

---
## Installation
 
Navigate to the location where you want to clone this repository:
```bash
cd /your_local_directory
```

Clone Visa Center Repository:
```bash
git clone https://github.com/ALatif8/VisaCenter.git
```

Install using composer:
```bash
composer install
```
----
## License

Visa Center is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
...
