# 🛠️ Authinfo - User Login Tracker  

The **authinfo** package provides a lightweight solution for logging user login activities within your Laravel application. It records successful login attempts by storing the user's ID and IP address in the database, offering basic insights into authentication activities. 

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

## Documentation
- [Features](#features)
- [Supported Versions](#supported-versions)
- [Installation](#installation)
    - [Commands](#commands)
        - [Vendor Publish](#vendor-publish)
        - [Migrate](#migrate)
- [Accessing the Plugin](#accessing-the-plugin)  


## **Features:**  
- **Logs user ID and IP address on each successful login.**  
- **Stores data in the `login_logs` database table.**  

# **Supported Versions:**  
- **PHP:** ^8.0  
- **Illuminate Support:** ^9.0 | ^10.0 | ^11.0  

## **Installation**  
To install the package Open the terminal and run the following command:  
<pre><code class="language-bash">composer require itpathsolutions/authinfo</code></pre>   

### **Commands**  

#### **Vendor Publish**  
Run the following command to publish the vendor files:  
<pre><code class="language-bash">php artisan vendor:publish --provider="Itpathsolutions\Authinfo\AuthInfoServiceProvider"</code></pre>  

#### **Migrate**  
Run the migration command to set up the necessary database tables:
<pre><code class="language-bash">php artisan migrate</code></pre>  

### **Accessing the Plugin**  
Once installed, you can check the login activities by manually opening the `login_logs` table in your database.  

There is no built-in route or UI for viewing login records—you need to access the database directly. 

## **Contributing**  
We welcome contributions from the community! Feel free to **Fork** the repository and contribute to this module. You can also create a pull request, and we will merge your changes into the main branch. See [CONTRIBUTING](https://github.com/vidhi-nirmal71/authinfo/blob/main/CONTRIBUTING.md) for details.  

## **Security Vulnerabilities**  
Please review our [Security Policy](https://github.com/vidhi-nirmal71/authinfo/security/policy) on how to report security vulnerabilities.  

## **License**  
This package is open-source and available under the MIT License. See the [LICENSE](https://github.com/vidhi-nirmal71/authinfo/blob/main/LICENSE) file for details.  

## **Testing**  
To test this package, run the following test command:  
<pre><code class="language-bash">composer test</code></pre>   

## **Get Support**  
- Feel free to [contact us](https://www.itpathsolutions.com/contact-us/) if you have any questions.  
- If you find this project helpful, please give us a ⭐ [Star](https://github.com/vidhi-nirmal71/authinfo/stargazers). 

## **You may also find our other useful package:**  
[MySQL Info Package 🚀](https://packagist.org/packages/itpathsolutions/mysqlinfo)  
[PHP Info Package 🚀](https://packagist.org/packages/itpathsolutions/phpinfo)  

## **📩 Need help? Contact us at enquiry@itpathsolutions.com.**
