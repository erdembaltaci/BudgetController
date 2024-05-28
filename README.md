## BudgetController
I developed this web-based application using HTML, CSS, JAVASCRIPT, MYSQL, BOOTSTRAP AND AJAX technologies as part of the web programming course project assignment.

## Project Description
You can track your monthly expenses and income with the Budget Controller website. You can see your net balance and analyze your financial situation.

## Project Link(Website link)
http://budgetcontroller.com.tr/

## Project Youtube Demo Video 
[Proje YouTube Linki](youtube_linki)

## Ekran Görüntüleri


## Gereksinimler

- XAMPP (Apache, MySQL, PHP)
- Git

## Kurulum Talimatları

1. **XAMPP Kurulumu**
   - XAMPP'ı indirin ve bilgisayarınıza kurun.
   - XAMPP Kontrol Panelini açın ve Apache ile MySQL sunucu servislerini başlatın.

2. **Projeyi Kopyalama**
   - Terminal veya komut istemcisini açın.
   - Aşağıdaki komutları çalıştırarak projeyi GitHub'dan klonlayın:
     ```sh
     git clone https://github.com/erdembaltaci/BudgetController.git
     ```

3. **Veritabanını Kurma**
   - PhpMyAdmin arayüzünü açın.
   - Yeni bir veritabanı oluşturun (örn. budgetcontrol).
   - Proje klasöründeki `budgetcontrol.sql` dosyasını içe aktararak veritabanı yapısını oluşturun.

4. **Projeyi XAMPP'ye Yerleştirme**
   - Klonladığınız proje klasörünü XAMPP htdocs dizinine taşıyın (örn. `C:\xampp\htdocs\public_html`).

5. **Veritabanı Bağlantısını Ayarlama**
   - `db_connect1.php` dosyasını açın.
   - Veritabanı bağlantı bilgilerinizi aşağıdaki gibi düzenleyin:
     ```php
     $connection = new mysqli('localhost', 'root', '', 'budgetcontrol');
     ```

6. **Projeyi Çalıştırma**
   - Tarayıcınızda `http://localhost/index.html` adresine gidin.
   - Uygulamayı kullanmaya başlayın.

## Kullanım

- **Kullanıcı girişi:** Giriş yaparak sipariş oluşturabilir veya yeni bir kullanıcı kaydı oluşturabilirsiniz.

## İletişim

Herhangi bir sorunuz olursa, [erdembaltaci5609@gmail.com](mailto:erdembaltaci5609@gmail.com) adresine e-posta gönderin.

## Lisans

Bu proje MIT Lisansı ile lisanslanmıştır. Daha fazla bilgi için [LICENSE](LICENSE) dosyasına bakın.
