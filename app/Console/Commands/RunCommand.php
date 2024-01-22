<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class RunCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Collection description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $numberCollection = collect([1, 1, 2, 3, 4, 5, 6, 4]);
        $numberCollection2 = collect([4, 5, 6, 7, 8, 9, 10, 2, 3]);
        $anotherNumberCollection = collect([10, 20, 30, 35, 40, 50, 55, 'asd', 'ads']);
        $thoseNumberCollection = collect([
            [1, 2, 3],
            [4, 5, 6],
            [7, 8, 9],
        ]);

        $thoseNumberCollection9 = collect([
            'name.first_name' => 'Boris_old',
            'name.last_name' => 'Boris_old',
            'name.sur_name' => 'Boris_old',
        ]);


        $assocWorkerCollection = collect([
            [
                'name' => 'Boris_old',
                'age' => 20
            ],
            [
                'name' => 'Ivan_old',
                'age' => 25
            ],
            [
                'name' => 'Elena_old',
                'age' => 18
            ],
            [
                'name' => 'Boris_new',
                'age' => 22
            ],
        ]);


        $assocWorkerCollection6 = collect([
            [
                'name' => 'Boris_old',
                'count' => [12, 2, 5]
            ],
            [
                'name' => 'Ivan_old',
                'count' => [2, 4, 56]
            ],
            [
                'name' => 'Elena_old',
                'count' => [1, 24, 6]
            ],
            [
                'name' => 'Boris_new',
                'count' => [2, 14, 56]
            ],
        ]);

        $assocWorkerCollection2 = collect([
            [
                'Boris', 20
            ],
            [
                'Ivan', 25
            ],
            [
                'Elena', 18
            ],
            [
                'Boris', 22
            ],
        ]);
        $userW = User::first();

        $nameCollection = collect([$userW, 'Ivan', 'Boris', 'Boris', 'Kate', 'Elena']);
        $nameCollection4 = collect(['Ivan', 'Boris', 'Elena', 'Tim', 'Katrina', 'Karl']);
        $nameCollection2 = collect([20, 25, 30]);


        $anotherNameCollection = collect(['Ann' => 'Boss', 'John' => 'Developer']);
        $anotherNameCollection2 = collect(['Ann' => 'Designer', 'John' => 'Boss']);
        $anotherNameCollection3 = collect(['Ann' => 20, 'Bob' => 25, 'John' => 30,]);
        $anotherNameCollection4 = collect(['Jane' => 25, 'Bob' => 35, 'John' => 30]);

        $users = User::all();
        $map = [];

        // 21.766784667969
//        foreach ($users as $user) {
//            $map[] = $user->name;
//        }
        // 21.764724731445
//        $users->each(function ($user) use ($map) {
//            $map[] = $user->name;
//        });

//        dd(memory_get_usage() / 1024 / 1024);

// 1) all - Получение всех значений коллекции, преобразовывая в массив
//        dd($numberCollection->all());

// 2) average(avg) - Получение среднестатистического значения у чисел сумма чисел / кол-во чисел
//        dd($numberCollection->avg());

// 3) chunk - Разбивает одну коллекцию на несколько, указав сколько значений в каждой
//        dd($numberCollection->chunk(5));

// 4) chunkWhile - Разбивает одну коллекцию на несколько, прокидываем функцию кол бэк и когда условие
// не выполняется, то коллекция разрывается до нового случая несоответствия
//            $result = $anotherNumberCollection->chunkWhile(function ($value, $key, $collection){
//                return $value % 10 === 0;
//            });
//        dd($result);

// 5) collapse - Объединяет подмассивы в один массив
//        dd($thoseNumberCollection->collapse());

// 6) collect - Создаёт коллекцию из массива
//        dd($thoseNumberCollection->collect());

// 7) combine - соединяет 2 коллекции, значения первой становятся ключами, значения второй = значениями новой коллекции
// количества значений в коллекциях, должно быть строго равны, чтобы не было ошибки
//        dd($nameCollection->combine($nameCollection2));

// 8) concat - в метод кладётся напрямую массив и его значения добавляются к коллекции, можно и переменную положить, но будет светиться
//        dd($nameCollection->concat([20, 25, 30]));

// 9) contains - проверка на true or false, содержит ли коллекция определённые значения или ключ и значение
// также можно указать условие в функции кол бэк
//        dd($nameCollection->contains('Ivan'));
//        dd($assocWorkerCollection->contains('name', 'Boris'));

//        $result = $nameCollection2->contains(function ($value) {
//            return $value < 13;
//        });

//        dd($result);
// 10) doesntContain - проверка на true or false, не содержит ли коллекция определённые значения или ключ и значение
//                dd($nameCollection->doesntContain('Ivan'));
//        dd($assocWorkerCollection->doesntContain('name', 'Boris'));
//
// 11) containsStrict - строгая проверка на true or false, не содержит ли коллекция определённые значения или ключ и значение
//                dd($nameCollection2->containsStrict('20'));

// 12) containsOneItem - строгая проверка на true or false, не содержит ли коллекция 1 эллемент
//        dd($nameCollection2->containsOneItem());

// 13) count = считает количество элементов в коллекции
//        dd($nameCollection2->count());

// 14) countBy - считает количество элементов в коллекции по-определенному условие и показывает сколько элементов соответствуют,
// а сколько нет
//            $result = $nameCollection2->countBy(function ($value) {
//                return $value % 10 === 0;
//            });
//        dd($result);

// 15) crossJoin - соединяет все значения одного массива с другим, сначала первое значение первого массива становится ключом
// ко всем значениям второго массива, затем следующий и так по отдельности каждый
//        dd($nameCollection->crossJoin($nameCollection2));

// 16)dd - показывает значения массива и прерывает код дальше и пропадает оболочка коллекции
//        $nameCollection->dd();

// 17)diff - показывает значения массива, которые есть в первой коллекции и которых нет во второй коллекции
//        dd($numberCollection2->diff($numberCollection));

// 18)diffAssoc - показывает ключи и значения ассоциативного массива, которые есть в первой коллекции и которых нет во второй коллекции
//        dd($anotherNameCollection->diffAssoc($anotherNameCollection2));

// 19)diffKeys - показывает ключи ассоциативного массива, которые есть в первой коллекции и которых нет во второй коллекции
//        dd($anotherNameCollection3->diffKeys($anotherNameCollection4));

// 20)dump - показывает значения массива и не прерывает код дальше и пропадает оболочка коллекции
//       $nameCollection->dump();
//        $anotherNameCollection4->dump();

// 21)duplicates - показывает все дубликаты значений массива и их позицию в массиве
//       dd($nameCollection->duplicates());
//        dd($assocWorkerCollection->duplicates('name'));

// 22)each - аналог foreach
//        $result = $assocWorkerCollection2->each(function ($name, $age){
////            dd($name, $age);
////        });
///
// 23)every - показывает удовлетворяют ли все значения массива определённому условию
//        $result = $numberCollection->every(function ($value){
//            return $value < 7;
//        });
//        dd($result);
///24)except - показывает значения ассоциативного массива кроме указанного
//        $result = $anotherNameCollection2->except(['John']);
//        dd($result);
///25)only - показывает значения ассоциативного массива только указанный
//        $result = $anotherNameCollection2->only(['John']);
//        dd($result);
///26)filter - показывает значения массива по определённому условию
//        $result = $anotherNumberCollection->filter(function ($value) {
//            return $value % 10 === 0;
//        });
//        dd($result);
///27)reject - показывает значения массива не соответствующие по определённому условию
//        $result = $anotherNumberCollection->reject(function ($value) {
//            return $value % 10 === 0;
//        });
//        dd($result);
///28)first - показывает первое значения массива
//        $result = $nameCollection->first();
//        dd($result);

//        $result = $anotherNumberCollection->first(function ($value) {
//          return $value % 10 === 0;
//        });
//        dd($result);

///28)firstOrFail - показывает первое значения массива или выкидывает Exception

//        $result = $anotherNumberCollection->firstOrFail(function ($value) {
//          return $value % 100 === 0;
//        });
//        dd($result);

///30)firstWhere - показывает первое указанное значения ассоциативного массива

//        $result = $assocWorkerCollection->firstWhere('name', 'Boris');
//        dd($result);

///31)last - показывает последнее значения массива
//        $result = $nameCollection->last();
//        dd($result);

//        $result = $anotherNumberCollection->last(function ($value) {
//            return $value % 10 === 0;
//        });
//        dd($result);

///32)flatMap - заменяет ключи в массиве
//        $result = $assocWorkerCollection->flatMap(function ($values) {
//            return [
//                [
//                    'new_name' => $values['name'],
//                    'new_age' => $values['age'],
//                ]
//            ];
//        });
//        dd($result);

///33)flatten - убирает границы ассоциативного массива и ключи и значения становятся значениями массива
/// и возможно указать степень погружения
//        $result = $assocWorkerCollection->flatten();
//        dd($result);

//        $result = $nameCollection->flatten(1);
//        dd($result);

///34)flip - меняет местами ключи и значения в массиве
//        $result = $anotherNameCollection2->flip();
//        dd($result);

///35)forget - удаляет значение из массива с ключом
//        $result = $anotherNameCollection2->forget('Ann');
//        dd($result);

///36)forPage - разбивает значения по количеству на страницу и показывает конкретную страницу с ними
//        $result = $anotherNumberCollection->forPage(2, 3);
//        dd($result);

///37)get - показывает значение по ключу
//        $result = $anotherNameCollection2->get('Ann');
//        dd($result);

//                $result = $anotherNameCollection2->get('Vasya', 'Unknown');
//        dd($result);

//38)groupBy - группирует массив по ключу, если дублируются значения будут сгруппированы вместе
//        $result = $assocWorkerCollection->groupBy('name');
//        dd($result);

//        $result = $assocWorkerCollection->groupBy(function ($values, $key) {
//            return substr($values['name'], -3);
//        });
//        dd($result);

//39) has - проверка на true or false, содержит ли коллекция определённые значения - ищет по ключу
        // и строгое соответствие выбранных элементов
//        dd($anotherNameCollection->has(['Ann', 'Boris']));


//40) hasAny - проверка на true or false, содержит ли коллекция определённые значения - ищет по ключу
//        // и нестрогое соответствие выбранных элементов
//       dd($anotherNameCollection->hasAny(['Ann', 'Boris']));
///
//41) implode - из массива составляет строку
//        dd($assocWorkerCollection->implode('name', '- '));

//                dd($assocWorkerCollection->implode(function ($value, $key) {
//                    return strtoupper($value['name']);
//                }, ', '));

//42) intersect - из 2=х массивов создаёт новый с одинаковыми значениями
//       dd($nameCollection->intersect($nameCollection4));

//43) isEmpty - проверка есть ли хоть что-то в коллекции
//       dd($nameCollection->isEmpty());

//44) isNotEmpty - проверка пусто ли в коллекции
//       dd($nameCollection->isNotEmpty());

//45) join - из массива составляет строку + между последним и предпоследним эл-ми символ
//        dd($nameCollection->join( ', ', ' and '));

//46)keyBy - группирует массив по ключу, добавляет группировка с ключом
//        $result = $assocWorkerCollection->keyBy('name');
//        dd($result);

//        $result = $assocWorkerCollection->keyBy(function ($values, $key) {
//            return 'this item ' . $key;
//        });
//        dd($result);

//47)keys - выдаёт ключи массива
//        $result = $anotherNameCollection->keys();
//        dd($result);

//48)lazy - преобразует в коллекцию, нужен для работы с большим объёмом данных
//        $result = $anotherNameCollection->lazy();
//        dd($result);

//49)macro - создание своей коллекции
//        Collection::macro('toUpper', function (){
//            return $this->map(function ($value){
//                return Str::upper($value);
//            });
//        });
//
//        $result = $anotherNameCollection->toUpper();
//        dd($result);
//50)make - преобразует массив в коллекцию
//        dd(Collection::make($anotherNameCollection));

//51)maр - меняет значение массива и он сам меняется
//                $result = $anotherNameCollection->map(function ($value, $key){
//                    return Str::upper($value);
//                });
//                dd($result);
//52)mapInto - преобразует массив в коллекцию c привязкой к классу
//        $result = $anotherNameCollection->mapInto(Person::class);
//                dd($result);
//53)mapSpread - преобразует значения массива в 1
//        $result = $assocWorkerCollection2->mapSpread(function ($name, $age){
//            return $name . ' ' . $age;
//        });
//                dd($result);
//54)mapToGroups - группирует значения массива по группам
//        $result = $assocWorkerCollection->mapToGroups(function ($values){
//            return [
//                $values['name'] => [
//                    'name' => $values['name'],
//                    'age' => $values['age']
//                ]
//
//            ];
//        });
//                dd($result);
//55)mapWithKeys - группирует значения массива по ключам
//        $result = $assocWorkerCollection->mapWithKeys(function ($values){
//            return [
//                $values['name'] => $values['age']
//            ];
//        });
//                dd($result);
// 56) max - выдаёт максимальное значение
//        dd($numberCollection->max());
// 57) min - выдаёт минимальное значение
//        dd($numberCollection->min());
// 58) median - выдаёт среднеаттическое значение
//        dd($numberCollection->median());
// 60) merge - объединяет коллекции в 1, в ассоциативном массиве если совпадают ключи то заменяет значения
//        dd($nameCollection->merge($nameCollection4));
//        dd($anotherNameCollection->merge($anotherNameCollection2));
// 61) mergeRecursive - объединяет коллекции в 1, в ассоциативном массиве если совпадают ключи то объединяет их в подмассив по ключу
//        dd($anotherNameCollection->mergeRecursive($anotherNameCollection2));
// 62) mode - выдаёт значения, которых не одно
//        $mode = $numberCollection->mode();
//        $mode = $numberCollection->mode();
//        dd($mode);
// 63) nth - выдаёт новую коллекцию с определённым шагом по списку значений и начинать может не с первого
//        dd($anotherNumberCollection->nth(4, 2));
// 64) pad - выдаёт новую коллекцию и заполняет новые элементы выбранным значением
//        dd($anotherNumberCollection->pad(10, 2));
// 65) partition - выдаёт новые коллекции первая с удовлетворяющее условие, вторая нет
//        [$first, $second] = $anotherNumberCollection->partition(function ($value){
//            return $value % 2 === 0;
//        });
//
//        [$first, $second] = $anotherNumberCollection->partition(function ($value) {
//            return is_int($value);
//        });
//        dd($first, $second);
// 66) pipeThrough - позволяет использовать много коллекций
//     $result = $anotherNumberCollection->pipeThrough([
//        function($values) {
//            return $values->filter(function ($item){
//                 return is_string($item);
//            });
//        },
//         function($values) {
//             return $values->map(function ($value) {
//                 return Str::upper($value);
//             });
//         },
//        ]);
//        dd($result);
// 67) pluck - показывает все значения массива по ключу
//        $result = $users->pluck('name','email')->toArray();
//        dd($result);

// 68) pop - показывает последнее значение или несколько с конца, после того как забрали эл-т из коллекции, он исключается из неё
//        $result = $nameCollection->pop(2);
//        dd($result);

// 69) prepend - в начало коллекции добавляет новое значение
//        $result = $nameCollection->prepend('Fads');
//        dd($result);
//                $result = $nameCollection->prepend('Fads', 23);
//        dd($result);
// 70) pull - показывает значение по ключу, после того как забрали эл-т из коллекции, он исключается из неё
//        $result = $anotherNameCollection->pull('Ann');
//        dd($result);
//// 71) push - в конец коллекции добавляет новое значение
//        $result = $nameCollection->push('Fdfht');
//        dd($result);
//// 72) put - в конец коллекции добавляет новое значение и ключ
//        $result = $anotherNameCollection->put('Fred', 'Junior');
//        dd($result);
//// 73) random - получаем указанное количество случайных чисел
//        $result = $anotherNameCollection->random(2);
//        dd($result);
//// 74) range - получаем диапазон значений
//        $result = collect([])->range(1, 100);
//        dd($result);

//// 75) reduce - получаем общее сложенно значение по ключ и можно указать стартовое значение $carry
//        $result = $assocWorkerCollection->reduce(function ($carry, $value){
//            return $carry + $value['age'];
//        }, 10);
//        dd($result);

//// 76) reduceSpread - получаем общее сложенно значение по ключ и можно указать стартовое значение $carry + отдельную суммацию по заданным признакам
//        [$even, $uneven] = $numberCollection2->reduceSpread(function ($even, $uneven, $value) {
//            if ($value % 2 === 0) {
//                $even += $value;
//            } else {
//                $uneven += $value;
//            }
//            return [$even, $uneven];
//        }, 0, 0);
//        dd($even, $uneven);
//// 77) replace - заменяет значения по ключу первой коллекции , значениями второй
//        $result = $anotherNameCollection->replace($anotherNameCollection2);
//        dd($result);
//// 78) reverse - значения массива будут в обратном порядке
//        $result = $numberCollection->reverse();
//        dd($result);
//// 79) search - ищет ключ по значению
//        $result = $anotherNameCollection->search('Boss');
//        dd($result);
//// 80) shift - отдаёт первое значение коллекции, но исключает из коллекции
//        $result = $anotherNameCollection->shift();
//        dd($result);
//// 81) shuffle - перемешивает значения
//        $result = $numberCollection->shuffle();
//        dd($result);
/// 82) skip - пропускает значения
//        $result = $numberCollection->skip(4);
//        dd($result);
/// 83) skipUntil - пропускает значения пока удовлетворяется условие
//        $result = $numberCollection->skipUntil(function (int $value){
//            return $value >= 4;
//        });
//        dd($result);
/// 84) slice - разрезает коллекцию с заданного значения массив не изменяется
//        $result = $numberCollection->slice(3, 2);
//        dd($result);
/// 85) sliding - разбивает коллекцию на подколлекцию по заданному количеству на что закончилось на то и началось, шагает по ключам
//        $result = $numberCollection->sliding(3, 3);
//        dd($result);
/// 84) sole - возвращает 1 единственный элемент соответствующий условия и он должен быть уникальным
//        $result = $numberCollection->sole(function ($value, $key){
//            return $value === 3;
//        });
//        dd($result);
// 85) some - проверка на true or false, содержит ли коллекция определённые значения или ключ и значение
// также можно указать условие в функции кол бэк
//        dd($nameCollection->some('Ivan'));
//        dd($assocWorkerCollection->contains('name', 'Boris'));
/// 86) sort - сортировка по условию
//        $result = $numberCollection2->sortBy();
//        dd($result);
/// 87) sortBy - сортировка по условию по ключу по возрастанию
//        $result = $assocWorkerCollection->sortBy('age');
//        dd($result);
// 88) sortByDesc - сортировка по условию по ключу по убыванию
//        $result = $assocWorkerCollection->sortByDesc('age');
//        dd($result);
//        $result = $assocWorkerCollection6->sortByDesc(function ($value, $key) {
//            return collect($value['count'])->sum();
//        });
//        dd($result);
/// 89) splice - разрезает коллекцию с заданного значения и ключи с начало идут и массив изменяется и на что заменить можно указать
//        $result = $numberCollection->splice(3);
//        dd($result);
//          $result = $numberCollection->splice(3,2, [20, 40]);
//        dd($numberCollection);
/// 90) split - разбивает коллекцию на указанное число подмассивов
//        $result = $nameCollection->split(3);
//        dd($result);

/// 91) splitIn - разбивает коллекцию на указанное число подмассивов но на равное количество
//        $result = $nameCollection->splitIn(2);
//        dd($result);
/// 92) sum - сумма значений
//        $result = $numberCollection->sum();
//        $result = $assocWorkerCollection->sum('age');
//        dd($result);
/// 93) take - берёт определённые  значения по количеству
///  //с начала
//        $result = $nameCollection->take(2);
        //с конца
//        $result = $nameCollection->take(-2);
//        dd($result);
// 94) takeWhile - берёт определённые  значения по количеству до заданного значения
//        $result = $numberCollection->takeUntil(3);
//        dd($result);
// 95) times - итератор сколько раз и что можно с чем то сделать
//        $result = Collection::times(100, function ($value){
//            return $value * 10;
//        });
//        dd($result);
// 96) toArray - преобразовывает коллекцию в массив для использования методов php
//        $result = $numberCollection->toArray();
//        dd($result);

// 97) toJson - преобразовывает коллекцию в Json строку
//        $result = $numberCollection->toJson();
//        dd($result);

// 98) transform - изменяет все значения по заданному условию и переопределяет саму коллекцию
//        $result = $assocWorkerCollection->transform(function ($value){
//            return [
//                'name' => $value['name'],
//                'age' => $value['age'] + 5,
//            ];
//        });
//        dd($result);
// 99) unDot - каждую точку воспринимает как вложенность и разбивает на массив
//        $result = $thoseNumberCollection9->unDot();
//        dd($result);
// 100) union - объединяет коллекции и добавляет к первой те ключи и значения, по ключам которых нет у первой
//        $result = $nameCollection->union($nameCollection4);
//        dd($result);
// 101) unique - отдаёт только уникальные значения, даже если они повторялись, убирает дубли
//        $result = $numberCollection->unique();
//        dd($result);
// 102) unless - аналог условного оператора, пока не выполняется то получим то-то
//            $bool = false;
//            $result = $numberCollection->unless($bool, function ($numberCollection, $value){
//                dd(11111111);
//            });

// 103) unlessEmpty - аналог условного оператора if и пока массив пустой, пока не выполняется то получим то-то
//            $result = $numberCollection->unlessEmpty( function ($numberCollection, $value){
//                dd(11111111);
//            },
//            function ($numberCollection, $value){
//                dd(22222);
//            });
// 104) unlessNotEmpty - аналог условного оператора if и пока массив  не пустой, пока не выполняется то получим то-то
//            $result = $numberCollection->unlessNotEmpty( function ($numberCollection, $value){
//                dd(11111111);
//            },
//            function ($numberCollection, $value){
//                dd(22222);
//            });
// 105) when - аналог условного оператора if, пока выполняется то получим то-то
//            $bool = false;
//            $result = $numberCollection->when($bool, function ($numberCollection, $value){
//                dd(11111111);
//            },
//            function ($numberCollection, $value){
//                dd(22222);
//            });
// 106) whenNotEmpty - аналог условного оператора if и пока массив  не пустой, пока выполняется то получим то-то
//            $result = $numberCollection->whenNotEmpty( function ($numberCollection, $value){
//                dd(11111111);
//            },
//            function ($numberCollection, $value){
//                dd(22222);
//            });
// 107) whenEmpty - аналог условного оператора if и пока массив пустой, пока выполняется то получим то-то
//        $result = $numberCollection->whenEmpty(function ($numberCollection, $value) {
//            dd(11111111);
//        },
//            function ($numberCollection, $value) {
//                dd(22222);
//            });
// 108) unwrap - преобразует коллекцию в массив но обращение к классу
//        $result = Collection::unwrap($numberCollection);
//        dd($result);
// 109) value - возвращает значение первого элемента
//        $result = $users->value('name');
//        dd($result);

// 110) values - создаёт новую коллекцию значение, но начало ключей пойдёт с 0
//        $result = $numberCollection->values();
//        dd($result);
// 111) where - получаем значения по условию выборки
//        $result = $users->where('age', '>', 70)->count();
//        dd($result);

// 112) whereBetween - получаем значения по условию выборки в диапозоне
//        $result = $users->whereBetween('age', [20, 40])->pluck('age');
//        dd($result);

// 113) whereIn - получаем значения по условию выборки в диапозоне
//        $result = $users->whereIn('age', [20, 27, 34])->pluck('age');
//        dd($result);

// 114) whereInstanceOf - получаем значения по условию выборки и соответствует ли модели
//        $result = $nameCollection->whereInstanceOf(User::class);
//        dd($result->count());

// 115) whereNotNull - получаем значения по условию выборки где по ключу не пустые значения
//        $result = $assocWorkerCollection->whereNotNull('age');
//        dd($result);
// 116) whereNull - получаем значения по условию выборки где по ключу пустые значения
//        $result = $assocWorkerCollection->whereNull('age');
//        dd($result);
// 117) wrap - преобразует коллекцию в массив в коллекцию
//        $result = Collection::wrap($numberCollection);
//        dd($result);
// 118) zip - попарно собирает коллекции в подмассивы c значениями
//        $result = $nameCollection->zip([6, 9, 7]);
//        dd($result);
    }
}
