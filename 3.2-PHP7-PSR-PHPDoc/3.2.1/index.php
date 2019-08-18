<?php
class Person
{
    protected $name;
    protected $surname;
    protected $patronymic;
    protected $gender;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = -1;
    const GENDER_UNDEFINED = 0;

    function __construct(string $name, string $surname, ?string $patronymic)
    {
        $this->name = $name;
        $this->surname = $surname;

        $surnameEnding = mb_substr($surname, -2);

        if ($surnameEnding == 'ов' || $surnameEnding == 'ин' || $surnameEnding == 'их' || $surnameEnding == 'ий') {
            $this->gender = self::GENDER_MALE;
        } elseif ($surnameEnding == 'ова' || $surnameEnding == 'ина' || $surnameEnding == 'ая' || $surnameEnding == 'ая') {
            $this->gender = self::GENDER_FEMALE;
        } else {
            $this->gender = self::GENDER_UNDEFINED;
        }

        if ($patronymic != null) {
            $this->patronymic = $patronymic;
        }

        $patronymicEnding = mb_substr($patronymic, -3);

        if ($patronymicEnding == 'вич' || $patronymicEnding == 'ьич' || $patronymicEnding == 'тич' || $patronymicEnding == 'глы') {
            $this->gender = self::GENDER_MALE;
        } elseif ($patronymicEnding == 'вна' || $patronymicEnding == 'чна' || $patronymicEnding == 'шна' || $patronymicEnding == 'ызы') {
            $this->gender = self::GENDER_FEMALE;
        } else {
            $this->gender = self::GENDER_UNDEFINED;
        }
    }

    function getFIO()
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic . ' ';
    }

    function getGender()
    {
        if ($this->gender === 1) {
            return 'male';
        }
        if ($this->gender === 0) {
            return 'undefined';
        }
        if ($this->gender === -1) {
            return 'female';
        }
    }

    function getGenderSymbol()
    {
        if ($this->gender === 1) {
            return "\u{2642}";
        }
        if ($this->gender === 0) {
            return "\u{1F60E}";
        }
        if ($this->gender === -1) {
            return "\u{2640}";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 3.2.1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<? $newPerson = new Person('Иван', 'Иванов', '') ?>
<h2><span class="gender-<?php echo $newPerson->getGender()?>"><?php echo $newPerson->getGenderSymbol()?></span> <?php echo $newPerson->GetFIO() ?></h2>
</body>
</html>

