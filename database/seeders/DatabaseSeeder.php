<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

         User::query()->updateOrCreate(['email'=>'admin@admin.com'],[
            'name' => 'iStoria Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('4HZ^16N2rJfrEF9wnAwo^'),
            'email_verified_at' => now(),
         ]);

         Setting::query()->updateOrCreate(['key'=>'general_rating'],[
             'key' => 'general_rating',
             'title' => 'التقييم العام',
             'description' => 'التحكم في التقييم العام للتطبيق',
             'value' => [5],
             'created_at' => now(),
         ]);

         Setting::query()->updateOrCreate(['key'=>'seo_title'],[
             'key' => 'seo_title',
             'title' => 'العنوان الترويجي',
             'description' => 'العنوان الترويجي للتطبيق',
             'value' => [
                'ar' => 'تعلم اللغة الانجليزية بسهولة مع افضل تطبيق لتعليم الانجليزية - ايستوريا',
                'en' => 'Learn English Easily with the Best English Learning App - iStoria',
                'de' => 'Lernen Sie Englisch einfach mit der besten Englisch-Lern-App - iStoria',
                'el' => 'Μάθετε Αγγλικά εύκολα με την καλύτερη εφαρμογή εκμάθησης Αγγλικών - iStoria',
                'es' => 'Aprende inglés fácilmente con la mejor aplicación para aprender inglés - iStoria',
                'fr' => 'Apprenez l\'anglais facilement avec la meilleure application d\'apprentissage de l\'anglais - iStoria',
                'it' => 'Impara l\'inglese facilmente con la migliore app per imparare l\'inglese - iStoria',
                'ja' => '最高の英語学習アプリで簡単に英語を学ぶ - iStoria',
                'ko' => '최고의 영어 학습 앱으로 쉽게 영어를 배우세요 - iStoria',
                'nl' => 'Leer Engels gemakkelijk met de beste Engelse leer-app - iStoria',
                'pl' => 'Ucz się angielskiego łatwo z najlepszą aplikacją do nauki angielskiego - iStoria',
                'pt' => 'Aprenda inglês facilmente com o melhor aplicativo para aprender inglês - iStoria',
                'ru' => 'Изучайте английский легко с лучшим приложением для изучения английского - iStoria',
                'tr' => 'En iyi İngilizce öğrenme uygulamasıyla kolayca İngilizce öğrenin - iStoria',
                'uk' => 'Вивчайте англійську легко з найкращим додатком для вивчення англійської - iStoria',
                'zh' => '使用最好的英语学习应用轻松学习英语 - iStoria',
             ],
             'created_at' => now(),
         ]);

         Setting::query()->updateOrCreate(['key'=>'seo_description'],[
             'key' => 'seo_description',
             'title' => 'الوصف الترويجي',
             'description' => 'الوصف الترويجي للتطبيق',
             'value' => [
                'ar' => 'ايستوريا افضل تطبيق لتعلم اللغة الانجليزية حتى الاحتراف وتعليم مفردات وكلمات جديدة من خلال القصص المدرجة ويصنف من افضل برامج الانجليزي',
                'en' => 'iStoria is the best app for learning English to professional level and teaching vocabulary and new words through integrated stories, classified as one of the best English programs',
                'de' => 'iStoria ist die beste App zum Erlernen der englischen Sprache bis zum professionellen Niveau und zum Unterrichten von Vokabeln und neuen Wörtern durch integrierte Geschichten, klassifiziert als eines der besten Englisch-Programme',
                'el' => 'Το iStoria είναι η καλύτερη εφαρμογή για την εκμάθηση της αγγλικής γλώσσας σε επαγγελματικό επίπεδο και τη διδασκαλία λεξιλογίου και νέων λέξεων μέσω ενσωματωμένων ιστοριών, ταξινομημένη ως ένα από τα καλύτερα αγγλικα προγράμματα',
                'es' => 'iStoria es la mejor aplicación para aprender inglés hasta el nivel profesional y enseñar vocabulario y palabras nuevas a través de historias integradas, clasificada como uno de los mejores programas de inglés',
                'fr' => 'iStoria est la meilleure application pour apprendre l\'anglais jusqu\'au niveau professionnel et enseigner le vocabulaire et les nouveaux mots à travers des histoires intégrées, classée comme l\'un des meilleurs programmes d\'anglais',
                'it' => 'iStoria è la migliore app per imparare l\'inglese fino al livello professionale e insegnare vocabolario e nuove parole attraverso storie integrate, classificata come uno dei migliori programmi di inglese',
                'ja' => 'iStoriaは、統合されたストーリーを通じて英語をプロレベルまで学び、語彙と新しい単語を教える最高のアプリで、最高の英語プログラムの一つとして分類されています',
                'ko' => 'iStoria는 통합된 이야기를 통해 영어를 전문가 수준까지 배우고 어휘와 새로운 단어를 가르치는 최고의 앱으로, 최고의 영어 프로그램 중 하나로 분류됩니다',
                'nl' => 'iStoria is de beste app voor het leren van Engels tot professioneel niveau en het onderwijzen van vocabulaire en nieuwe woorden door middel van geïntegreerde verhalen, geclassificeerd als een van de beste Engelse programma\'s',
                'pl' => 'iStoria to najlepsza aplikacja do nauki angielskiego na poziomie profesjonalnym i nauczania słownictwa oraz nowych słów poprzez zintegrowane historie, sklasyfikowana jako jeden z najlepszych programów angielskich',
                'pt' => 'iStoria é o melhor aplicativo para aprender inglês até o nível profissional e ensinar vocabulário e palavras novas através de histórias integradas, classificado como um dos melhores programas de inglês',
                'ru' => 'iStoria - это лучшее приложение для изучения английского языка до профессионального уровня и обучения лексике и новым словам через интегрированные истории, классифицированное как одна из лучших программ по английскому языку',
                'tr' => 'iStoria, entegre hikayeler aracılığıyla İngilizce\'yi profesyonel seviyeye kadar öğrenmek ve kelime hazinesi ve yeni kelimeler öğretmek için en iyi uygulamadır, en iyi İngilizce programlarından biri olarak sınıflandırılır',
                'uk' => 'iStoria - це найкращий додаток для вивчення англійської мови до професійного рівня та навчання лексики та нових слів через інтегровані історії, класифікований як одна з найкращих програм з англійської мови',
                'zh' => 'iStoria是通过集成故事学习英语到专业水平并教授词汇和新单词的最佳应用程序，被归类为最好的英语程序之一',
             ],
             'created_at' => now(),
         ]);

         Setting::query()->updateOrCreate(['key'=>'seo_keywords'],[
             'key' => 'seo_keywords',
             'title' => 'الكلمات المفتاحية',
             'description' => 'الكلمات المفتاحية للتطبيق',
             'value' => [
                'ar' => 'ايستوريا, تعلم اللغة الانجليزية, افضل تطبيق انجليزي, تعليم الانجليزية, مفردات انجليزية, كلمات جديدة, قصص تعليمية, برامج تعلم الانجليزية, تطبيق تعليمي, تعلم الانجليزية بسهولة',
                'en' => 'iStoria, learn English, best English app, English learning, English vocabulary, new words, educational stories, English learning programs, educational app, learn English easily',
                'de' => 'iStoria, Englisch lernen, beste Englisch-App, Englisch-Lernen, Englisch-Vokabular, neue Wörter, lehrreiche Geschichten, Englisch-Lernprogramme, Bildungs-App, Englisch einfach lernen',
                'el' => 'iStoria, μάθετε Αγγλικά, καλύτερη εφαρμογή Αγγλικών, εκμάθηση Αγγλικών, αγγλικό λεξιλόγιο, νέες λέξεις, εκπαιδευτικές ιστορίες, προγράμματα εκμάθησης Αγγλικών, εκπαιδευτική εφαρμογή, μάθετε Αγγλικά εύκολα',
                'es' => 'iStoria, aprende inglés, mejor aplicación de inglés, aprendizaje de inglés, vocabulario inglés, palabras nuevas, historias educativas, programas de aprendizaje de inglés, aplicación educativa, aprende inglés fácilmente',
                'fr' => 'iStoria, apprendre l\'anglais, meilleure application d\'anglais, apprentissage de l\'anglais, vocabulaire anglais, nouveaux mots, histoires éducatives, programmes d\'apprentissage de l\'anglais, application éducative, apprendre l\'anglais facilement',
                'it' => 'iStoria, impara l\'inglese, migliore app di inglese, apprendimento dell\'inglese, vocabolario inglese, nuove parole, storie educative, programmi di apprendimento dell\'inglese, app educativa, impara l\'inglese facilmente',
                'ja' => 'iStoria, 英語学習, 最高の英語アプリ, 英語学習, 英語語彙, 新しい単語, 教育的な物語, 英語学習プログラム, 教育アプリ, 簡単に英語を学ぶ',
                'ko' => 'iStoria, 영어 학습, 최고의 영어 앱, 영어 학습, 영어 어휘, 새로운 단어, 교육적인 이야기, 영어 학습 프로그램, 교육 앱, 쉽게 영어 배우기',
                'nl' => 'iStoria, Engels leren, beste Engelse app, Engelse leren, Engelse vocabulaire, nieuwe woorden, educatieve verhalen, Engelse leerprogramma\'s, educatieve app, Engels gemakkelijk leren',
                'pl' => 'iStoria, nauka angielskiego, najlepsza aplikacja angielska, uczenie się angielskiego, słownictwo angielskie, nowe słowa, historie edukacyjne, programy nauki angielskiego, aplikacja edukacyjna, łatwa nauka angielskiego',
                'pt' => 'iStoria, aprenda inglês, melhor aplicativo de inglês, aprendizagem de inglês, vocabulário inglês, palavras novas, histórias educativas, programas de aprendizagem de inglês, aplicativo educacional, aprenda inglês facilmente',
                'ru' => 'iStoria, изучение английского, лучшее приложение для английского, обучение английскому, английская лексика, новые слова, образовательные истории, программы изучения английского, образовательное приложение, легко выучить английский',
                'tr' => 'iStoria, İngilizce öğrenin, en iyi İngilizce uygulaması, İngilizce öğrenme, İngilizce kelime hazinesi, yeni kelimeler, eğitici hikayeler, İngilizce öğrenme programları, eğitim uygulaması, İngilizce\'yi kolayca öğrenin',
                'uk' => 'iStoria, вивчення англійської, найкращий додаток для англійської, навчання англійської, англійська лексика, нові слова, освітні історії, програми вивчення англійської, освітній додаток, легко вивчити англійську',
                'zh' => 'iStoria, 英语学习, 最佳英语应用, 英语学习, 英语词汇, 新单词, 教育故事, 英语学习程序, 教育应用, 轻松学习英语',
             ],
             'created_at' => now(),
         ]);

         Setting::query()->updateOrCreate(['key'=>'seo_image'],[
             'key' => 'seo_image',
             'title' => 'صورة التطبيق',
             'description' => 'صورة التطبيق',
             'value' => ["https://istoria.app/wp-content/uploads/2023/04/Basic-Colors-1-2.png"],
             'created_at' => now(),
         ]);

         $this->call([
            ReviewSeeder::class,
         ]);
    }
}
