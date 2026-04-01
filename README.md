# Invento KS

Inventory and Invoice Management System built with Laravel, PHP, MySQL, Blade, and Tailwind CSS.

Overview

Invento KS is a simple business management system for managing inventory and invoices.
It helps track products, suppliers, customers, and sales while automatically reducing stock when products are sold.

Features

Authentication with Laravel Breeze
Role-based access control (`admin`, `staff`)
Category management
Supplier management
Customer management
Product management
Invoice creation
Invoice item handling
Automatic stock reduction
Dashboard with key business statistics
Reusable Blade UI components

Technologies Used

Laravel
PHP
MySQL
Blade
Tailwind CSS
Laravel Breeze

Modules

Categories

Used to organize products into groups.

Suppliers

Used to store supplier information for products.

Customers

Used to manage customer data for invoices.

Products

Each product belongs to a category and a supplier.

Products include:
name
sku
description
price
stock quantity

Invoices

Invoices are created for customers and include sold products.

Invoice Items

Invoice items store:
product
quantity
unit price
subtotal

Business Logic

A product belongs to one category
A product belongs to one supplier
A category has many products
A supplier has many products
A customer has many invoices
An invoice belongs to a customer
An invoice belongs to a user
An invoice has many invoice items
Stock quantity decreases automatically when an invoice is created

Roles

Admin

Full access to the system.
Can manage categories, suppliers, customers, products, and invoices.

Staff

Can manage operational modules.
Can create invoices and sell products.

Installation

Clone the repository:

```bash
git clone https://github.com/fortesaab/invento
cd invento
```
