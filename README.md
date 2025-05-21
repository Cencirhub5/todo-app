📝 Todo Uygulaması
Bu basit ancak güçlü Todo Uygulaması, Laravel framework'ü ile geliştirilmiştir. Görevlerini organize etmene, takip etmene ve tamamlamana yardımcı olmak için tasarlandı. Gruplar ve listeler halinde düzenleme yeteneği ile projelerini veya günlük işlerini daha verimli yönetebilirsin!

✨ Özellikler
Görev Ekleme: Yeni görevler oluştur.
Görev Listeleme: Tüm görevlerini görüntüle.
Görev Tamamlama/Tamamlamama: Görevlerinin durumunu kolayca değiştir.
Görev Silme: Tamamlanan veya gereksiz görevleri kaldır.
Gruplar: Görevlerini mantıksal olarak gruplandır (örn. Ev, İş, Kişisel).
Listeler (Çok Yakında!): Her grubun içinde özel listeler oluşturarak daha detaylı organize ol (örn. İş grubunda "Toplantılar", "Raporlar").
Hatırlatıcılar (Çok Yakında!): Görevlerine hatırlatıcı tarihleri ekle.
Görev Düzenleme (Çok Yakında!): Mevcut görevlerinin ayrıntılarını güncelle.
🚀 Kurulum
Bu projeyi yerel ortamında çalıştırmak için aşağıdaki adımları izle:

Projeyi Klonla:
Bash

git clone https://github.com/KULLANICI_ADIN/TODO-UYGULAMASI.git
cd TODO-UYGULAMASI
Composer Bağımlılıklarını Yükle:
Bash

composer install
Ortam Dosyasını Oluştur: .env.example dosyasını kopyala ve adını .env olarak değiştir.
Bash

cp .env.example .env
Uygulama Anahtarını Oluştur:
Bash

php artisan key:generate
Veritabanını Yapılandır: .env dosyasını aç ve aşağıdaki veritabanı ayarlarını kendi veritabanı bilgilerine göre düzenle (genellikle DB_DATABASE, DB_USERNAME, DB_PASSWORD).
Kod snippet'i

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_todo # Kendi veritabanı adın
DB_USERNAME=root         # Kendi veritabanı kullanıcı adın
DB_PASSWORD=             # Kendi veritabanı şifren
Veritabanı Migrationlarını Çalıştır: Bu komut, uygulamanın kullandığı tabloları veritabanında oluşturur.
Bash

php artisan migrate
Geliştirme Sunucusunu Başlat:
Bash

php artisan serve
Tarayıcında http://127.0.0.1:8000/tasks adresini ziyaret ederek uygulamayı görüntüleyebilirsin.
🤝 Katkıda Bulunma
Geliştirmeye katkıda bulunmak istersen, lütfen bir "pull request" açmaktan çekinme! Her türlü katkı memnuniyetle karşılanır.


📝 Todo Application
This simple yet powerful Todo Application is developed with the Laravel framework. It's designed to help you organize, track, and complete your tasks. With the ability to organize into groups and lists, you can manage your projects or daily tasks more efficiently!

✨ Features
Add Tasks: Create new tasks.
List Tasks: View all your tasks.
Mark Tasks Complete/Incomplete: Easily change the status of your tasks.
Delete Tasks: Remove completed or unnecessary tasks.
Groups: Logically group your tasks (e.g., Home, Work, Personal).
Lists (Coming Soon!): Create specific lists within each group for more detailed organization (e.g., "Meetings", "Reports" within the Work group).
Reminders (Coming Soon!): Add reminder dates to your tasks.
Edit Tasks (Coming Soon!): Update the details of your existing tasks.
🚀 Installation
To run this project on your local machine, follow these steps:

Clone the Repository:
Bash

git clone https://github.com/YOUR_USERNAME/TODO-APP.git
cd TODO-APP
Install Composer Dependencies:
Bash

composer install
Create Environment File: Copy the .env.example file and rename it to .env.
Bash

cp .env.example .env
Generate Application Key:
Bash

php artisan key:generate
Configure Database: Open the .env file and update the database settings with your own database credentials (typically DB_DATABASE, DB_USERNAME, DB_PASSWORD).
Kod snippet'i

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_todo # Your database name
DB_USERNAME=root         # Your database username
DB_PASSWORD=             # Your database password
Run Database Migrations: This command will create the necessary tables for the application in your database.
Bash

php artisan migrate
Start the Development Server:
Bash

php artisan serve
Visit http://127.0.0.1:8000/tasks in your browser to view the application.
🤝 Contributing
If you'd like to contribute to the development, feel free to open a pull request! All contributions are welcome.
