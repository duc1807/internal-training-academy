# Internal Training Academy

This project is my code submission for Unit 30-*Application Development* course of [Pearson BTEC Higher National Diploma in Computing Level 5](https://qualifications.pearson.com/en/qualifications/btec-higher-nationals.html) qualification. 

## Screenshots

![Front-end screenshots](/docs/screenshots/screenshots.gif)

## System Design

![ERD](/docs/ERD(transparent).png)

![Use Case Diagram](/docs/use_case_diagram.png)

## Dependencies
- Development of this application relied on these technologies: 
    - PHP 5.4
    - Apache Server 2.4
    - MySQL 5.5 
    
## Project File Structure
- [`assets` folder](./assets): web assets
- SQL files in [`sql` folder](./sql): `schema.sql` provides schema of this database, `data.sql` provides mock data. 
- [`utils` folder](./utils): PHP-to-MySQL connection initialisation
- Regarding *CRUD* operations: controllers for *Create*, *Update* and *Remove* operations are in [`controllers` folder](./controllers).
- [`components` folder](./components): embedded in-page PHP components
