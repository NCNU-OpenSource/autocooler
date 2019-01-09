# 我不要熱死	LSA-1071

## 簡介
題目發想來源是散熱器，大致上我們使用的散熱器很少能隨溫度而改變轉動速度。因此我們設計的是當物體在X度的時候會自動開啓風扇扇熱和燈泡發亮，達到X度的時候因溫度太高而蜂鳴器會發出警告聲和燈泡閃爍。

## 使用材料
| 材料名稱 | 數量 | 來源 |
| ------- | --- | --- |
| 麵包板 | 1 | Moli借用 |
| 燈泡 | 3 | Moli借用 |
| 蜂鳴器 | 1 | Moli借用 |
| 繼電器 | 1 | Moli借用 |
| 溫濕度感測器 | 1 | Moli借用 |
| Raspberrt Pi 3 | 1 | 課堂提供 |
| 綫 | 20 | 課堂提供 |
| 風扇 | 1 | 自備 |

## 成品
圖

## 電路圖
![](https://i.imgur.com/3y3dsdO.png)

## 程式
主要功能：在不一樣的溫度，風扇、蜂鳴器和燈泡的反應都不一樣

## 使用的現有軟體與來源
Python,PHP,Mysql

## 分工
主題發想：全員

資料搜集、採購：全員

程式碼，環境：林煒星

硬體：錢詠恩、梁杏兒

## 參考
1. LED教學：https://sites.google.com/site/raspberrypidiy/basic/gpioled
2. 繼電器教學：http://www.codedata.com.tw/java/att10/ 
3. 蜂鳴器教學：https://github.com/gumslone/raspi_buzzer_player/blob/master/buzzer_player.py
4. Readme 參考 https://github.com/NCNU-OpenSource/Bian-yuan-ren-candles 
5. https://github.com/NCNU-OpenSource/NoBomBom
