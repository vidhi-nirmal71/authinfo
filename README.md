# 🛠️ Authinfo - User Login Tracker  

The **Authinfo** package provides a powerful and lightweight solution for logging and monitoring user authentication activities within your Laravel application. It records successful login and logout attempts, capturing essential details such as user ID, username, IP address, user agent, login/logout time, device type, and location. This package is designed primarily for **admin use**, allowing administrators to track and audit user activity securely.  

## **⚠️ Security Warning**
This package does not include any built-in security measures and is intended for admin use only. It exposes sensitive login user details, which could pose a security risk if accessed by unauthorized users. Ensure that this package is only used in a secure environment and not exposed to public or unauthorized access.  

<p>🏷️  
<a href="https://packagist.org/search/?tags=authentication" target="_blank">#Authentication</a>&nbsp;
<a href="https://packagist.org/search/?tags=security" target="_blank">#Security</a>&nbsp;
<a href="https://packagist.org/search/?tags=user-tracking" target="_blank">#UserTracking</a>&nbsp;
<a href="https://packagist.org/search/?tags=laravel" target="_blank">#Laravel</a>&nbsp;
<a href="https://packagist.org/search/?tags=php" target="_blank">#PHP</a>&nbsp;
<a href="https://packagist.org/search/?tags=login-monitoring" target="_blank">#LoginMonitoring</a>&nbsp;
<a href="https://packagist.org/search/?tags=security-audit" target="_blank">#SecurityAudit</a>&nbsp;
<a href="https://packagist.org/search/?tags=server-monitoring" target="_blank">#ServerMonitoring</a>&nbsp;
<a href="https://packagist.org/search/?tags=devops" target="_blank">#DevOps</a>&nbsp;
<a href="https://packagist.org/search/?tags=access-control" target="_blank">#AccessControl</a>&nbsp;
</p>

## Documentation
- [Features](#features)
- [Supported Versions](#supported-versions)
- [Installation](#installation)
    - [Commands](#commands)
        - [Vendor Publish](#vendor-publish)
        - [Migrate](#migrate)
- [Accessing Login Logs](#accessing-login-logs)
- [FAQs](#faqs)
- [Contributing](#contributing)
- [Security Vulnerabilities](#security-vulnerabilities)
- [License](#license)
- [Testing](#testing)
- [Support](#get-support)

## **Features**
- **Tracks successful logins and logouts** with essential details.
- **Logs user ID, username, and IP address** for each authentication event.
- **Stores data in a dedicated `login_logs` database table**.
- **Records user agent, login time, logout time, and device type**.
- **Captures user location** (based on IP address lookup).
- **Provides a built-in, responsive table UI** for admin users.
- **Includes pagination and search functionality** for easy record browsing.
- **Fully responsive design** for both desktop and mobile views.
- **Easy installation with vendor publish and migration commands**.
- **Supports Laravel 9, 10, and 11 with PHP 8+ compatibility**.
- **Allows filtering login records based on date range and user search**.
- **Lightweight and optimized for performance**.
- **Provides an audit trail for login/logout activity monitoring**.

## **Supported Versions**
- **PHP:** ^8.0  
- **Illuminate Support:** ^9.0 | ^10.0 | ^11.0  

## **Installation**  
To install the package, open the terminal and run the following command:  
<pre><code class="language-bash">composer require itpathsolutions/authinfo</code></pre>   

### **Commands**  

#### **Vendor Publish**  
Run the following command to publish the package configuration and migration files:  
<pre><code class="language-bash">php artisan vendor:publish --provider="Itpathsolutions\Authinfo\AuthInfoServiceProvider"</code></pre>  

#### **Migrate**  
Run the migration command to set up the necessary database tables:
<pre><code class="language-bash">php artisan migrate</code></pre>  

### **Accessing Login Logs**  
Once installed, open the following URL in your browser to check the plugin:  
<pre><code class="language-bash">localhost:8000/login-logs</code></pre>    

This table provides a **searchable, paginated** view of login and logout records, including username, IP address, device type, location, and timestamps.

## **FAQs**

## 1. What does this package do?  
🚀 The **Authinfo** package logs and monitors user **login/logout** activities, capturing crucial details like **user ID, IP address, device type, timestamps**, and more. It provides admins with a **clear audit trail** of authentication events.  

## 2. How do I install the package?  
📦 Installing is simple! Run the following command in your terminal:  
<pre><code class="language-bash">composer require itpathsolutions/authinfo</code></pre>

## 3. Which Laravel versions are supported?  
This package supports **Laravel 9, 10, and 11** with **PHP 8+** compatibility.  

## 4. Where are login logs stored?  
📂 All login and logout events are stored in the **`login_logs`** table in your database.  

## 5. How do I view login logs?  
You can access login logs via:  
👉 `localhost:8000/login-logs`  

## 6. How do I update the package to the latest version?  
Run the following command to update:
<pre><code class="language-bash">composer update itpathsolutions/authinfo</code></pre>  

## 7. Can I contribute to this package?  
🤝 Absolutely! Contributions are welcome. See the [CONTRIBUTING](https://github.com/vidhi-nirmal71/authinfo/blob/main/CONTRIBUTING.md) guidelines for details.   

## 8. Where can I get support?  
For any support or queries, contact us via [IT Path Solutions](https://www.itpathsolutions.com/contact-us/). 



## **Contributing**  
We welcome contributions from the community! Feel free to **Fork** the repository and contribute to this module. You can also create a pull request, and we will merge your changes into the main branch. See [CONTRIBUTING](https://github.com/vidhi-nirmal71/authinfo/blob/main/CONTRIBUTING.md) for details.  

## **Security Vulnerabilities**  
Please review our [Security Policy](https://github.com/vidhi-nirmal71/authinfo/security/policy) on how to report security vulnerabilities.  

## **License**  
This package is open-source and available under the MIT License. See the [LICENSE](https://github.com/vidhi-nirmal71/authinfo/blob/main/LICENSE) file for details.  

## **Testing**  
To test this package, run the following command:  
<pre><code class="language-bash">composer test</code></pre>   

## **Get Support**  
- Feel free to [contact us](https://www.itpathsolutions.com/contact-us/) if you have any questions.  
- If you find this project helpful, please give us a ⭐ [Star](https://github.com/vidhi-nirmal71/authinfo/stargazers).  

## **You may also find our other useful package:**  
<a href="https://packagist.org/packages/itpathsolutions/mysqlinfo" target="_blank">MySQL Info Package 🚀</a>  
<a href="https://packagist.org/packages/itpathsolutions/phpinfo" target="_blank">PHP Info Package 🚀</a>
<a href="https://packagist.org/packages/itpathsolutions/role-wise-session-manager" target="_blank">Role Wise Session Manager Package 🚀</a>
<a href="https://packagist.org/packages/itpathsolutions/chatbot" target="_blank">Chatbot Package 🚀</a>


