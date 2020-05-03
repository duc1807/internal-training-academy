# Internal Training Academy

This is code submission for assignment 2 of *Application Development* course.

## Notes and comments
- Development of this application is strongly reliant on `Apache HTTP Server`, `MySQL` server & `PHPMyAdmin` DBMS provided by `XAMPP`. For this reason, these configurations defined in [`db.php`](utils/db.php) and [`connect.php`](utils/connect.php) are defined exclusively for `PHPMyAdmin`.
- The latest version of `XAMPP` contains `MariaDB` instead of `MySQL`. Follow [this instruction](https://odan.github.io/2017/08/13/xampp-replacing-mariadb-with-mysql.html) to get `MySQL` back. Otherwise, I personally recommend using `XAMPP` v5.6.11 (which includes `MySQL` Community Server 5.6.25) below.

### Project File Structure
- Regarding *CRUD* operations: controllers for *Create*, *Update* and *Remove* operations are in [`controllers` folder](./controllers).