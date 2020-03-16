<?php

class Nice
{
    public function values()
    {
        return array_values(get_object_vars($this));
    }

    public function first()
    {
        return $this->values()[0];
    }

    public function last()
    {
        return array_pop($this->values());
    }
}

function improve(array $array)
{
    return unserialize(sprintf(
        'O:%d:"%s"%s',
        strlen('Nice'),
        'Nice',
        strstr(serialize(
            array_merge((array)new Nice(),
                isset($array[0]) ? array_combine($array, $array) : $array)
        ), ':')
    ));
}

//function rulesCallback($carry, $value)
//{
//    $value = explode(':', $value);
//    $carry[$value[0]] = isset($value[1]) ? $value[1] : true;
//    return $carry;
//}

function rules($rules)
{
    return improve(array_reduce(explode('|', $rules), function ($carry, $value) {
        $value = explode(':', $value);
        $carry[$value[0]] = isset($value[1]) ? $value[1] : true;
        return $carry;
    }, []));
}
