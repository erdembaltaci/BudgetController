## Bütçe Kontrolcüsü
Web tabanlı bir uygulama olan Bütçe Kontrolcüsü, HTML, CSS, JAVASCRIPT, MYSQL, BOOTSTRAP VE AJAX teknolojilerini kullanarak web programlama dersi proje ödevi olarak geliştirildi.

## Proje Açıklaması
Bütçe Kontrolcüsü web sitesi ile aylık gelir ve giderlerinizi takip edebilirsiniz. Net bakiyenizi görebilir ve finansal durumunuzu analiz edebilirsiniz.

## Proje Bağlantısı
[http://budgetcontroller.com.tr/](http://budgetcontroller.com.tr/)

## Proje YouTube Demo Videosu
[Proje YouTube Linki](youtube_linki)

## Ekran Görüntüleri
![WhatsApp Görsel 2024-05-28 saat 23 58 41_ba2d11d4](https://github.com/erdembaltaci/BudgetController/assets/103959698/bef14397-9dd1-401d-9670-0770b864ca35)

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

- **Üye Ol:** Siteye üye olarak yeni hesap oluşturup daha sonra giriş yaparak siteyi kullanmaya başlayabilirsiniz. Gelir ve gider ekleyebilir, bunları listeleyip düzenleme ve silme işlemleri yapabilirsiniz. Tüm bunları aylara göre kategorilendirilmiş şekilde görerek aylık finans takibi yapabilirsiniz.

## İletişim

Herhangi bir sorunuz olursa, [erdembaltaci5609@gmail.com](mailto:erdembaltaci5609@gmail.com) adresine e-posta gönderebilirsiniz.

## Lisans

Bu proje MIT Lisansı ile lisanslanmıştır. Daha fazla bilgi için [LICENSE](LICENSE) dosyasına bakabilirsiniz.
