# IMSC TEST

## Description

This project is an inventory system for the management of office items. Its objective is to help companies to register and have a traceability of their elements, to whom they were assigned, who has an element at the moment, how many elements the company has, etc.

## How it works?

The application works as a REST API in this project we use laravel to take care of all the backend.

The application offers:

1. Register Companies.
2. Register Cities.
3. Register Workers.
4. Create Users and assign them Roles.
5. Register Categories and define the attributes that we want to save.
6. Register Elements in existing categories.
7. Assign Items to Workers.
8. Keep track of the Items assigned to an Worker

## Database

<!-- TODO describe better the database -->

We use a Mysql database to store all of the data

### **Relational Model**

![Relational Model](/database/model.png)

### **Model after migrations**

![Relational Model](/database/model_laravel.png)
