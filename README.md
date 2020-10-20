**Working through project from "PHP with MySQL Essential Training: 1 The Basics".**

**Skills**  

- Installing and using the LAMP stack  
- Apache 
- MySQL 
- PHP 
- HTTP methods: GET,POST

**PHP for web pages**

- Links and URLs
- Encode URL parameters
- Dynamic data
- XSS and how to avoid it

**Headers and redirects**
- Use HTTP for error codes and quick redirects (e.g. for log in pages or ecommerce)
- Output buffering (use php.ini file and ob_start() )
- PHP header() function

**Building Forms**
- Using POST
- Single page submission

**MySQL basics**
- CRUD in MySQL
- Relational database tables

**PHP and MySQL**
- Connect to MySQL with PHP
- Database APIs
- Retrieve data
- Error handling
- CRUD with PHP

**Validating data with PHP**
- Presence, string length, type, inclusion in / exclusion from a set, format, uniqueness etc.  
- Advantage of one page submission for validation and error displays
- Suprisingly true comparisons in PHP (type juggling) e.g. 3 == "3 dogs", 100 == "1e2" etc.
- Use exactly equals === to avoid type juggling
- Suprisingly empty "", 0, "0", null, false, array()
- Regular expressions can overlook rare cases

**SQL Injection and how to prevent it**
- Any query using dynamic data is vulnerable
- Biggest security concern for websites
- Add backslash before single quotes
- addslashes($string) and mysqli_real_escape_string($db, $string)
- Use single quoted values to force attackers to circumvent data delimiters
- Typecast can be useful too
- Prepared statements