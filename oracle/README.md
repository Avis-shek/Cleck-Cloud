# Cleck Cloud — Oracle Database & APEX

This directory contains the Oracle implementation from the original Cleck Cloud project.

## Structure

```text
oracle/
├── database/
│   ├── schema.sql
│   ├── ddl.sql
│   ├── dml.sql
│   ├── sequences.sql
│   └── triggers.sql
├── reports/
│   ├── collection-slot-details.sql
│   ├── customer-payment-details.sql
│   ├── daily-reports.sql
│   ├── highest-product-orders.sql
│   ├── monthly-reports.sql
│   ├── order-calendar.sql
│   ├── order-details.sql
│   ├── payments-per-day.sql
│   ├── reviews.sql
│   ├── top-selling-products.sql
│   └── weekly-reports.sql
└── apex/
    ├── application-export/
    │   └── cleck_cloud_apex_103.sql
    └── security/
        ├── authentication.sql
        └── authorization.sql
```

## Database

`database/schema.sql` is the complete original Cleck Cloud database script. It defines the marketplace schema and its core entities, including users, shops, products, categories, carts, wishlists, orders, order details, collection slots, payments, reviews, discounts and reports.

The supporting files preserve the original DDL, DML, sequences and trigger implementations.

## Reporting SQL

The `reports/` directory contains the SQL used for operational and analytical views in the project, including daily/weekly/monthly reporting, top-selling products, payment reporting, order details, order calendars, reviews and collection-slot information.

## Oracle APEX

`apex/application-export/cleck_cloud_apex_103.sql` is the original Oracle APEX 19.2 application export (Application 103: `cleck_cloud`).

The export contains the management application used for Trader and Admin functionality, including dashboards, master-detail interfaces, reports, calendars and role-based views.

The original export reports:

- 40 pages
- 192 page items
- 52 processes
- 107 regions
- 89 buttons
- 34 dynamic actions
- 2 authentication schemes
- 3 authorization schemes

The separate files in `apex/security/` preserve the original authentication and authorization SQL.

> These files are preserved from the original academic implementation. Filenames have been cleaned for repository readability, but the SQL content has not been rewritten.
