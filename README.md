# **Crisis Management Platform**  


<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-10-red" alt="Laravel Version"></a>
  <a href="#"><img src="https://img.shields.io/badge/PHP-8.2-blue" alt="PHP Version"></a>
  <a href="#"><img src="https://img.shields.io/badge/MySQL-Database-orange" alt="MySQL"></a>
  <a href="#"><img src="https://img.shields.io/badge/Live%20Chat-Enabled-green" alt="Live Chat"></a>
</p>

## **About the Project**  

The **Crisis Management Platform** is a web-based system designed to assist **Gaza citizens** in times of war by providing fast access to **health, food, and education services**. The platform also enables users to track the latest news and access useful links.

### **Key Features:**  
✅ **Real-time notifications** using Pusher & Echo.  
✅ **Live chat** to facilitate communication between admins and institutions.  
✅ **Advanced search** with Scout & Algolia for quick access to resources.  
✅ **Role-based access control** using Spatie for secure user management.  
✅ **Location-based services** with Leaflet for mapping shelters and aid centers.  
✅ **Email alerts** using Mailtrap for critical updates.  

## **Tech Stack**  

- **Frontend:** HTML, CSS, JavaScript, jQuery, Bootstrap  
- **Backend:** PHP, Laravel  
- **Database:** MySQL  
- **Maps:** Leaflet  
- **Real-time Features:** Pusher with Echo  
- **Search Engine:** Algolia with Laravel Scout  
- **Authentication & Roles:** Spatie  
- **Email Services:** Mailtrap  

## **Installation**  

```bash
git clone https://github.com/elsibakhi/crisis-management-gaza.git
cd crisis-management-gaza
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## **Compiles frontend assets**


```bash
npm run dev
## OR
npm run build
```

## **Processes queued jobs in the background**


```bash
php artisan queue:work
```

## **Contributing**  

We welcome contributions! If you’d like to improve the project, feel free to open a **pull request** or submit an **issue**.

## **License**  

This project is **open-source** and available under the [MIT License](LICENSE).
