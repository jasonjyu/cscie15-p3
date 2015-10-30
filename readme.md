# Project 3: Laravel Basics

## Live URL
<http://p3.lengjai.me>

## Description
A web application called *Developer's Best Friend* which includes a **Lorem Ipsum Generator** and a **Random User Generator**.

## Demo
[Screencast Link](https://youtu.be/b_lsm6JQqXw)

## Details for teaching team
For the Lorem Ipsum generator, I ran the commands:
```shell
> cd vendor/fzaninotto/faker/src/Faker/Provider
> find . -name Text.php | sed 's/\.\///' | sed 's/\/.*//'
```
to get the language locale codes that the Faker package supported for generating random text.

For the Random User generator, I ran the commands:
```shell
> cd vendor/fzaninotto/faker/src/Faker/Provider
> find . -name Address.php | sed 's/\.\///' | sed 's/\/.*//'
```
to get the language locale codes that the Faker package supported for generating address.  And I repeated this command for phone numbers (*PhoneNumber.php*) and email addresses (*Internet.php*).
I decoded the locale codes using the webpage <http://www.science.co.il/Language/Locale-codes.asp> and saved all the information into the Excel spreadsheet [locale.xlsx](locale.xlsx).

For the xkcd Password generator, I downloaded the list of words from <http://www.wordfrequency.info> into the file wordfrequency.info_words and then ran the command:
```shell
> sort wordfrequency.info_words | grep -v - | uniq > words
```
to filter out words with hyphens.
And I modified the App\Providers\AppServiceProvider class and added a custom validation rule to validate that the Letter Case parameter is a function.

## Outside code
* Bootstrap: http://getbootstrap.com/
* Bootstrap Theme: http://bootswatch.com/readable/
* jQuery Mobile Form Sliders: http://www.w3schools.com/jquerymobile/jquerymobile_form_sliders.asp
* jQuery Mobile Form Checkboxes: http://www.w3schools.com/jquerymobile/jquerymobile_form_inputs.asp
* jQuery Mobile Form Select Menus: http://www.w3schools.com/jquerymobile/jquerymobile_form_select.asp
