## Bütçe Kontrolör
Bu web tabanlı projeyi web tabanlı programlama dersi proje ödevi kapsamında HTML, CSS, JAVASCRIPT, MYSQL, BOOTSTRAP VE AJAX teknolojilerini kullanarak geliştirdim.

## Proje Açıklaması
Bütçe Kontrolör web sitesi ile aylık gelir ve giderlerinizi takip edebilirsiniz. Net bakiyenizi görebilir ve finansal durumunuzu analiz edebilirsiniz.

## Proje Bağlantısı(Web site)
[http://budgetcontroller.com.tr/](http://budgetcontroller.com.tr/)

## Proje YouTube Demo Videosu
https://youtu.be/TE7B_UyG3_A

## Ekran Görüntüleri
#Ana sayfa
![image](https://github.com/erdembaltaci/BudgetController/assets/103959698/625142c2-88b4-4427-b5cc-b19866428161)

#Kayıt sayfası
![image](https://github.com/erdembaltaci/BudgetController/assets/103959698/4d76eff6-8830-4b0c-8d7f-b38fba69aa22)

#Giriş sayfası
![image](https://github.com/erdembaltaci/BudgetController/assets/103959698/8c786099-95f0-4d04-8373-95830f797e9f)


#Kullanıcı paneli
![image](https://github.com/erdembaltaci/BudgetController/assets/103959698/3bd25ffd-1d6f-4dc8-8144-1dc4e2674614)

#Gelir-gider verilerinin listelenmesi
![image](https://github.com/erdembaltaci/BudgetController/assets/103959698/d19396c3-32dd-4f75-bdd3-7fd195e94a69)

#Gelir- gider ekleme
![image](https://github.com/erdembaltaci/BudgetController/assets/103959698/1f8abd8c-5fb2-43c0-8033-6beb1fb427bb)


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
   - Tarayıcınızda `http://localhost/public_html` adresine gidin.
   - Uygulamayı kullanmaya başlayın.

## Kullanım

- **Üye Ol:** Siteye üye olarak yeni hesap oluşturup daha sonra giriş yaparak siteyi kullanmaya başlayabilirsiniz. Gelir ve gider ekleyebilir, bunları listeleyip düzenleme ve silme işlemleri yapabilirsiniz. Tüm bunları aylara göre kategorilendirilmiş şekilde görerek aylık finans takibi yapabilirsiniz.

## İletişim

Herhangi bir sorunuz olursa, [erdembaltaci5609@gmail.com](mailto:erdembaltaci5609@gmail.com) adresine e-posta gönderebilirsiniz.

## Lisans

Bu proje MIT Lisansı ile lisanslanmıştır. Daha fazla bilgi için [LICENSE](LICENSE) dosyasına bakabilirsiniz.
