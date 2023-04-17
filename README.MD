# RSS PHP 

Library for consumption of various RSS for Brazilian news sites

<p align="center">
   <img src="https://img.shields.io/bower/l/MI?style=flat-square">
   <img src="https://img.shields.io/badge/version-1.0.1-blue">
   <img src="https://img.shields.io/github/issues/rhaymisonbetini/rss-php.svg">
   <img src="https://img.shields.io/github/issues-closed/rhaymisonbetini/rss-php.svg">
   <img src="https://img.shields.io/github/issues-pr/rhaymisonbetini/rss-php.svg">
   <img src="https://img.shields.io/github/issues-pr-closed/rhaymisonbetini/rss-php.svg">
</p>

<p align="center">
   <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white">
   <img src="https://img.shields.io/badge/RSS-FFA500?style=for-the-badge&logo=rss&logoColor=white">
</p>

<p align="center">
  <a href="https://www.linkedin.com/in/heleno-betini-2b3016175/" target="_blank">
    <img src="https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin&logoColor=white">
  </a>
  <a href="https://github.com/rhaymisonbetini" target="_blank">
    <img src="https://img.shields.io/badge/GitHub-100000?style=for-the-badge&logo=github&logoColor=white">
  </a>
</p>

## INSTALL
```bash
composer require rhaym/rssphpbrasil
```

## HOW TO USE

In your php file you need to include the RssBrasil and create a new class instance.

```php
use Rhaym\Rssphpbrasil\RssBrasil;
$rssBrasil = new RssBrasil;
```

That's good! Now you can call any many methods for provider news to you front-end

### METHODS

```php
//This method return a big array with all types of news
 function getRss(): array

return [
'financial' => [],
'entretain' => [],
'politics' => [],
'sports' => [],
'tec' =>[],
'world' => [],
'general' => [],
'eua' => [],
'europe' => [],
]
```

```php
//this method get a financialRSS in Brasil e return a array
public function getFinancialRss(): array
return [$gazetaDoPovo, $r7];
```

```php
//this method get a entretain in Brasil e return a array 
public function getEntretainRss(): array
return [$globo, $gazetaPovoEntretain];
```

```php
//this method get a politics in Brasil e return a array 
public function getPolitcRss(): array
return [$g1, $elpais];
```

```php
//this method get a sports in Brasil e return a array 
public function getSportsRss(): array
return [$sportsBrasil];
```

```php
//this method get a tec in Brasil e return a array 
public function getTecRss(): array
return [$tecBrasil];
```

```php
// this method get a world news in PT Brasil e return a array 
public function getWorldRss(): array
return [$gazetaDoPovoworld, $g1world];
```

```php
// this method get a world news in PT Brasil e return a array 
public function getGeneralRss(): array
return [$generalG1, $generalR7];
```

```php
// this method get a iternational (EUA) news (EN) e returna a array
public function unitedStates(): array
return [$us];
```

```php
//this method get a iternation (europe) news (EN) e returna a array
public function europe(): array
return [$europe];
```

### RETURNS

All arrays have the same format for better use
Exemple:
```php
[
[url] => https://g1.globo.com/economia/noticia/2023/04/17/brasil-e-paraguai-fecham-acordo-e-tarifa-de-servicos-de-itaipu-e-fixada-us-1671.ghtml
[title] => Brasil e Paraguai fecham acordo, e tarifa de serviços de Itaipu é fixada US$ 16,71
 [description] => Decisão foi tomada durante reunião extraordinária do Conselho de Itaipu. Comportas de vertedouro de Itaipu Binacional
Rubens Fraulini / Itaipu Binacional
O ministro de Minas e Energia, Alexandre Silveira, e o diretor-geral da Itaipu Binancional, Enio Verri, afirmaram nesta segunda-feira (17) que a tarifa de serviços de eletricidade de Itaipu foi fixada em US$ 16,71 por quilowatt (kW).
A decisão foi tomada durante reunião extraordinária do Conselho de Itaipu em comum acordo com o governo paraguaio.
A tarifa de serviços é tecnicamente chamada de Custo Unitário dos Serviços de Eletricidade (Cuse), que é o principal componente da tarifa de repasse da usina - ou seja, da tarifa paga pelas distribuidoras de energia e repassada ao consumidor final.
Na prática, o valor definido nesta segunda representa uma baixa de 19,5% em relação ao que vinha sendo praticado em 2022, que era de US$ 20,75.
Segundo Verri, a redução representará uma queda de 1 ponto percentual na tarifa média de energia.
Hidrelétrica de Itaipu vai passar por processo de modernização com duração de 14 anos
Acordo
No fim governo Bolsonaro, o lado brasileiro fixou unilateralmente uma tarifa de serviços de eletricidade de US$ 12,67, porém, segundo Verri, o valor foi praticado por apenas algumas distribuidoras e não tinha acordo do governo paraguaio.
Os conselheiros paraguaios defendiam que a tarifa de serviço ficasse em torno de US$ 20 em 2023, valor similar ao que era praticado no ano passado.
Nesta segunda, o que houve foi que ambos os lados chegaram a um consenso e fixaram a tarifa de serviços em US$ 16,71.
Agora a Aneel deve voltar a definir o valor final da tarifa de repasse, que é a paga pelas distribuidoras.
Atualmente, a tarifa de repasse de Itaipu está fixada provisoriamente em US$ 16,19.
As distribuidoras do Sul, Sudeste e Centro-Oeste são obrigadas a comprar a energia gerada por Itaipu, num sistema de cotas. Por isso, o valor final da tarifa de Itaipu tem efeito na conta de luz dos consumidores dessas regiões.
[image] => https://s2.glbimg.com/TnG18aAAM-b3YfZ_-nzLJF6Cu-A=/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2023/k/A/UQyDyFQHGAA53TfA2Bbw/whatsapp-image-2023-04-03-at-14.24.46.jpeg
]
```

### Have a good time! =]