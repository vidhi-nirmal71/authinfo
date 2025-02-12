# 🛠️ User Login Tracker - Monitor & Log User Login Activities in Laravel    

The **User Login Tracker** package provides detailed insights into user authentication activities within your Laravel application. It logs successful and failed login attempts, tracks login locations, device details, IP addresses, and timestamps, helping you monitor security and user behavior effectively.  

## Documentation
- [Features](#features)
- [Supported Versions](#supported-versions)
- [Installation](#installation)
    - [Commands](#commands)
    - [Vendor Publish](#vendor-publish)
    - [Migrate](#migrate)
- [Accessing the Login Tracker](#accessing-the-login-tracker)  


## **Features:**  
- **Track user login activities, including timestamps and IP addresses.**  
- **Monitor failed login attempts to enhance security.**  
- **Log user agent details such as device type and browser information.**  
- **View login history and analyze user authentication patterns.**  

# **Supported Versions:**  
- **PHP:** ^8.0  
- **Illuminate Support:** ^9.0 | ^10.0 | ^11.0  

## **Installation**  
To install the package Open the terminal and run the following command:  
<pre><code class="language-bash">composer require itpathsolutions/user-login-tracker</code></pre>   

### **Commands**  

#### **Vendor Publish**  
Run the following command to publish the vendor files:  
<pre><code class="language-bash">php artisan vendor:publish</code></pre>  

#### **Migrate**  
Run the migration command to set up the necessary database tables:
<pre><code class="language-bash">php artisan migrate</code></pre>  

### **Accessing the Login Tracker**  
Once installed, you can check the login activities by manually opening the `login_logs` table in your database.  

There is no built-in route or UI for viewing login records—you need to access the database directly.  

<p>🏷️  
<a href="https://packagist.org/search/?tags=authentication">#Authentication</a>&nbsp;  
<a href="https://packagist.org/search/?tags=security">#Security</a>&nbsp;  
<a href="https://packagist.org/search/?tags=user-tracking">#UserTracking</a>&nbsp;  
<a href="https://packagist.org/search/?tags=laravel">#Laravel</a>&nbsp;  
<a href="https://packagist.org/search/?tags=php">#PHP</a>&nbsp;  
<a href="https://packagist.org/search/?tags=login-monitoring">#LoginMonitoring</a>&nbsp;  
<a href="https://packagist.org/search/?tags=security-audit">#SecurityAudit</a>&nbsp;  
<a href="https://packagist.org/search/?tags=server-monitoring">#ServerMonitoring</a>&nbsp;  
<a href="https://packagist.org/search/?tags=devops">#DevOps</a>&nbsp;  
<a href="https://packagist.org/search/?tags=access-control">#AccessControl</a>  
</p>  

## **Contributing**
We welcome contributions from the community! Feel free to **Fork** the repository and contribute to this module. You can also create a pull request, and we will merge your changes into the main branch. See [CONTRIBUTING](https://github.com/itpathsolutions/user-login-tracker/blob/main/CONTRIBUTING.md) for details.

## **Changelog**
Please see [CHANGELOG](https://github.com/itpathsolutions/user-login-tracker/blob/main/CHANGELOG.md) for more information on what has changed recently.

## **Security Vulnerabilities**
Please review our [Security Policy](https://github.com/itpathsolutions/user-login-tracker/security/policy) on how to report security vulnerabilities.

## **License**
This package is open-source and available under the MIT License. See the [LICENSE](https://github.com/itpathsolutions/user-login-tracker/blob/main/LICENSE) file for details.

## **Testing**
To test this package, run the following test command:  

<pre><code class="language-bash">composer test</code></pre>  


## **Get Support**
- Feel free to [contact us](https://github.com/itpathsolutions/user-login-tracker/issues) if you have any questions.
- If you find this project helpful, please give us a ⭐ [Star](https://github.com/itpathsolutions/user-login-tracker/stargazers).

## **You may also find our other useful package:**  
[MySQL Info Package 🚀](https://packagist.org/packages/itpathsolutions/mysqlinfo)  
[PHP Info Package 🚀](https://packagist.org/packages/itpathsolutions/phpinfo)  

## **📩 Need help? Contact us at enquiry@itpathsolutions.com.**
