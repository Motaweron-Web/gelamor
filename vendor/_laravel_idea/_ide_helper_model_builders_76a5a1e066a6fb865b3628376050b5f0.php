<?php //e18b6e7a91333e0a12a9cf33a635a31a
/** @noinspection all */

namespace LaravelIdea\Helper\App\Models {

    use App\Models\Admin;
    use App\Models\Category;
    use App\Models\Chef;
    use App\Models\Component;
    use App\Models\ContactUs;
    use App\Models\Country;
    use App\Models\Currency;
    use App\Models\Meal;
    use App\Models\MealType;
    use App\Models\OrderSpecial;
    use App\Models\Package;
    use App\Models\Setting;
    use App\Models\User;
    use Illuminate\Contracts\Support\Arrayable;
    use Illuminate\Database\Query\Expression;
    use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Pagination\Paginator;
    use LaravelIdea\Helper\_BaseBuilder;
    use LaravelIdea\Helper\_BaseCollection;

    /**
     * @method Admin|null getOrPut($key, $value)
     * @method Admin|$this shift(int $count = 1)
     * @method Admin|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Admin|$this pop(int $count = 1)
     * @method Admin|null pull($key, $default = null)
     * @method Admin|null last(callable $callback = null, $default = null)
     * @method Admin|$this random(int|null $number = null)
     * @method Admin|null sole($key = null, $operator = null, $value = null)
     * @method Admin|null get($key, $default = null)
     * @method Admin|null first(callable $callback = null, $default = null)
     * @method Admin|null firstWhere(string $key, $operator = null, $value = null)
     * @method Admin|null find($key, $default = null)
     * @method Admin[] all()
     */
    class _IH_Admin_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Admin[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_Admin_QB whereId($value)
     * @method _IH_Admin_QB whereName($value)
     * @method _IH_Admin_QB whereEmail($value)
     * @method _IH_Admin_QB wherePassword($value)
     * @method _IH_Admin_QB whereCreatedAt($value)
     * @method _IH_Admin_QB whereUpdatedAt($value)
     * @method Admin baseSole(array|string $columns = ['*'])
     * @method Admin create(array $attributes = [])
     * @method _IH_Admin_C|Admin[] cursor()
     * @method Admin|null|_IH_Admin_C|Admin[] find($id, array $columns = ['*'])
     * @method _IH_Admin_C|Admin[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Admin|_IH_Admin_C|Admin[] findOrFail($id, array $columns = ['*'])
     * @method Admin|_IH_Admin_C|Admin[] findOrNew($id, array $columns = ['*'])
     * @method Admin first(array|string $columns = ['*'])
     * @method Admin firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Admin firstOrCreate(array $attributes = [], array $values = [])
     * @method Admin firstOrFail(array $columns = ['*'])
     * @method Admin firstOrNew(array $attributes = [], array $values = [])
     * @method Admin firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Admin forceCreate(array $attributes)
     * @method _IH_Admin_C|Admin[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Admin_C|Admin[] get(array|string $columns = ['*'])
     * @method Admin getModel()
     * @method Admin[] getModels(array|string $columns = ['*'])
     * @method _IH_Admin_C|Admin[] hydrate(array $items)
     * @method Admin make(array $attributes = [])
     * @method Admin newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Admin[]|_IH_Admin_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Admin[]|_IH_Admin_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Admin sole(array|string $columns = ['*'])
     * @method Admin updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Admin_QB extends _BaseBuilder {}

    /**
     * @method Category|null getOrPut($key, $value)
     * @method Category|$this shift(int $count = 1)
     * @method Category|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Category|$this pop(int $count = 1)
     * @method Category|null pull($key, $default = null)
     * @method Category|null last(callable $callback = null, $default = null)
     * @method Category|$this random(int|null $number = null)
     * @method Category|null sole($key = null, $operator = null, $value = null)
     * @method Category|null get($key, $default = null)
     * @method Category|null first(callable $callback = null, $default = null)
     * @method Category|null firstWhere(string $key, $operator = null, $value = null)
     * @method Category|null find($key, $default = null)
     * @method Category[] all()
     */
    class _IH_Category_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Category[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_Category_QB whereId($value)
     * @method _IH_Category_QB whereNameAr($value)
     * @method _IH_Category_QB whereNameEn($value)
     * @method _IH_Category_QB whereCreatedAt($value)
     * @method _IH_Category_QB whereUpdatedAt($value)
     * @method Category baseSole(array|string $columns = ['*'])
     * @method Category create(array $attributes = [])
     * @method _IH_Category_C|Category[] cursor()
     * @method Category|null|_IH_Category_C|Category[] find($id, array $columns = ['*'])
     * @method _IH_Category_C|Category[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Category|_IH_Category_C|Category[] findOrFail($id, array $columns = ['*'])
     * @method Category|_IH_Category_C|Category[] findOrNew($id, array $columns = ['*'])
     * @method Category first(array|string $columns = ['*'])
     * @method Category firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Category firstOrCreate(array $attributes = [], array $values = [])
     * @method Category firstOrFail(array $columns = ['*'])
     * @method Category firstOrNew(array $attributes = [], array $values = [])
     * @method Category firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Category forceCreate(array $attributes)
     * @method _IH_Category_C|Category[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Category_C|Category[] get(array|string $columns = ['*'])
     * @method Category getModel()
     * @method Category[] getModels(array|string $columns = ['*'])
     * @method _IH_Category_C|Category[] hydrate(array $items)
     * @method Category make(array $attributes = [])
     * @method Category newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Category[]|_IH_Category_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Category[]|_IH_Category_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Category sole(array|string $columns = ['*'])
     * @method Category updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Category_QB extends _BaseBuilder {}

    /**
     * @method Chef|null getOrPut($key, $value)
     * @method Chef|$this shift(int $count = 1)
     * @method Chef|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Chef|$this pop(int $count = 1)
     * @method Chef|null pull($key, $default = null)
     * @method Chef|null last(callable $callback = null, $default = null)
     * @method Chef|$this random(int|null $number = null)
     * @method Chef|null sole($key = null, $operator = null, $value = null)
     * @method Chef|null get($key, $default = null)
     * @method Chef|null first(callable $callback = null, $default = null)
     * @method Chef|null firstWhere(string $key, $operator = null, $value = null)
     * @method Chef|null find($key, $default = null)
     * @method Chef[] all()
     */
    class _IH_Chef_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Chef[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_Chef_QB whereId($value)
     * @method _IH_Chef_QB whereName($value)
     * @method _IH_Chef_QB whereEmail($value)
     * @method _IH_Chef_QB wherePassword($value)
     * @method _IH_Chef_QB whereCreatedAt($value)
     * @method _IH_Chef_QB whereUpdatedAt($value)
     * @method Chef baseSole(array|string $columns = ['*'])
     * @method Chef create(array $attributes = [])
     * @method _IH_Chef_C|Chef[] cursor()
     * @method Chef|null|_IH_Chef_C|Chef[] find($id, array $columns = ['*'])
     * @method _IH_Chef_C|Chef[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Chef|_IH_Chef_C|Chef[] findOrFail($id, array $columns = ['*'])
     * @method Chef|_IH_Chef_C|Chef[] findOrNew($id, array $columns = ['*'])
     * @method Chef first(array|string $columns = ['*'])
     * @method Chef firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Chef firstOrCreate(array $attributes = [], array $values = [])
     * @method Chef firstOrFail(array $columns = ['*'])
     * @method Chef firstOrNew(array $attributes = [], array $values = [])
     * @method Chef firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Chef forceCreate(array $attributes)
     * @method _IH_Chef_C|Chef[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Chef_C|Chef[] get(array|string $columns = ['*'])
     * @method Chef getModel()
     * @method Chef[] getModels(array|string $columns = ['*'])
     * @method _IH_Chef_C|Chef[] hydrate(array $items)
     * @method Chef make(array $attributes = [])
     * @method Chef newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Chef[]|_IH_Chef_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Chef[]|_IH_Chef_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Chef sole(array|string $columns = ['*'])
     * @method Chef updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Chef_QB extends _BaseBuilder {}

    /**
     * @method Component|null getOrPut($key, $value)
     * @method Component|$this shift(int $count = 1)
     * @method Component|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Component|$this pop(int $count = 1)
     * @method Component|null pull($key, $default = null)
     * @method Component|null last(callable $callback = null, $default = null)
     * @method Component|$this random(int|null $number = null)
     * @method Component|null sole($key = null, $operator = null, $value = null)
     * @method Component|null get($key, $default = null)
     * @method Component|null first(callable $callback = null, $default = null)
     * @method Component|null firstWhere(string $key, $operator = null, $value = null)
     * @method Component|null find($key, $default = null)
     * @method Component[] all()
     */
    class _IH_Component_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Component[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_Component_QB whereId($value)
     * @method _IH_Component_QB whereImg($value)
     * @method _IH_Component_QB whereNameAr($value)
     * @method _IH_Component_QB whereNameEn($value)
     * @method _IH_Component_QB whereProtein($value)
     * @method _IH_Component_QB whereCalories($value)
     * @method _IH_Component_QB whereFats($value)
     * @method _IH_Component_QB whereCarbohydrates($value)
     * @method _IH_Component_QB whereCreatedAt($value)
     * @method _IH_Component_QB whereUpdatedAt($value)
     * @method Component baseSole(array|string $columns = ['*'])
     * @method Component create(array $attributes = [])
     * @method _IH_Component_C|Component[] cursor()
     * @method Component|null|_IH_Component_C|Component[] find($id, array $columns = ['*'])
     * @method _IH_Component_C|Component[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Component|_IH_Component_C|Component[] findOrFail($id, array $columns = ['*'])
     * @method Component|_IH_Component_C|Component[] findOrNew($id, array $columns = ['*'])
     * @method Component first(array|string $columns = ['*'])
     * @method Component firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Component firstOrCreate(array $attributes = [], array $values = [])
     * @method Component firstOrFail(array $columns = ['*'])
     * @method Component firstOrNew(array $attributes = [], array $values = [])
     * @method Component firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Component forceCreate(array $attributes)
     * @method _IH_Component_C|Component[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Component_C|Component[] get(array|string $columns = ['*'])
     * @method Component getModel()
     * @method Component[] getModels(array|string $columns = ['*'])
     * @method _IH_Component_C|Component[] hydrate(array $items)
     * @method Component make(array $attributes = [])
     * @method Component newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Component[]|_IH_Component_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Component[]|_IH_Component_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Component sole(array|string $columns = ['*'])
     * @method Component updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Component_QB extends _BaseBuilder {}

    /**
     * @method ContactUs|null getOrPut($key, $value)
     * @method ContactUs|$this shift(int $count = 1)
     * @method ContactUs|null firstOrFail($key = null, $operator = null, $value = null)
     * @method ContactUs|$this pop(int $count = 1)
     * @method ContactUs|null pull($key, $default = null)
     * @method ContactUs|null last(callable $callback = null, $default = null)
     * @method ContactUs|$this random(int|null $number = null)
     * @method ContactUs|null sole($key = null, $operator = null, $value = null)
     * @method ContactUs|null get($key, $default = null)
     * @method ContactUs|null first(callable $callback = null, $default = null)
     * @method ContactUs|null firstWhere(string $key, $operator = null, $value = null)
     * @method ContactUs|null find($key, $default = null)
     * @method ContactUs[] all()
     */
    class _IH_ContactUs_C extends _BaseCollection {
        /**
         * @param int $size
         * @return ContactUs[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_ContactUs_QB whereId($value)
     * @method _IH_ContactUs_QB whereName($value)
     * @method _IH_ContactUs_QB whereEmail($value)
     * @method _IH_ContactUs_QB whereSubject($value)
     * @method _IH_ContactUs_QB whereMessage($value)
     * @method _IH_ContactUs_QB whereCreatedAt($value)
     * @method _IH_ContactUs_QB whereUpdatedAt($value)
     * @method ContactUs baseSole(array|string $columns = ['*'])
     * @method ContactUs create(array $attributes = [])
     * @method _IH_ContactUs_C|ContactUs[] cursor()
     * @method ContactUs|null|_IH_ContactUs_C|ContactUs[] find($id, array $columns = ['*'])
     * @method _IH_ContactUs_C|ContactUs[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method ContactUs|_IH_ContactUs_C|ContactUs[] findOrFail($id, array $columns = ['*'])
     * @method ContactUs|_IH_ContactUs_C|ContactUs[] findOrNew($id, array $columns = ['*'])
     * @method ContactUs first(array|string $columns = ['*'])
     * @method ContactUs firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method ContactUs firstOrCreate(array $attributes = [], array $values = [])
     * @method ContactUs firstOrFail(array $columns = ['*'])
     * @method ContactUs firstOrNew(array $attributes = [], array $values = [])
     * @method ContactUs firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method ContactUs forceCreate(array $attributes)
     * @method _IH_ContactUs_C|ContactUs[] fromQuery(string $query, array $bindings = [])
     * @method _IH_ContactUs_C|ContactUs[] get(array|string $columns = ['*'])
     * @method ContactUs getModel()
     * @method ContactUs[] getModels(array|string $columns = ['*'])
     * @method _IH_ContactUs_C|ContactUs[] hydrate(array $items)
     * @method ContactUs make(array $attributes = [])
     * @method ContactUs newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|ContactUs[]|_IH_ContactUs_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|ContactUs[]|_IH_ContactUs_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method ContactUs sole(array|string $columns = ['*'])
     * @method ContactUs updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_ContactUs_QB extends _BaseBuilder {}

    /**
     * @method Country|null getOrPut($key, $value)
     * @method Country|$this shift(int $count = 1)
     * @method Country|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Country|$this pop(int $count = 1)
     * @method Country|null pull($key, $default = null)
     * @method Country|null last(callable $callback = null, $default = null)
     * @method Country|$this random(int|null $number = null)
     * @method Country|null sole($key = null, $operator = null, $value = null)
     * @method Country|null get($key, $default = null)
     * @method Country|null first(callable $callback = null, $default = null)
     * @method Country|null firstWhere(string $key, $operator = null, $value = null)
     * @method Country|null find($key, $default = null)
     * @method Country[] all()
     */
    class _IH_Country_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Country[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_Country_QB whereId($value)
     * @method _IH_Country_QB whereNameAr($value)
     * @method _IH_Country_QB whereNameEn($value)
     * @method _IH_Country_QB whereCreatedAt($value)
     * @method _IH_Country_QB whereUpdatedAt($value)
     * @method Country baseSole(array|string $columns = ['*'])
     * @method Country create(array $attributes = [])
     * @method _IH_Country_C|Country[] cursor()
     * @method Country|null|_IH_Country_C|Country[] find($id, array $columns = ['*'])
     * @method _IH_Country_C|Country[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Country|_IH_Country_C|Country[] findOrFail($id, array $columns = ['*'])
     * @method Country|_IH_Country_C|Country[] findOrNew($id, array $columns = ['*'])
     * @method Country first(array|string $columns = ['*'])
     * @method Country firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Country firstOrCreate(array $attributes = [], array $values = [])
     * @method Country firstOrFail(array $columns = ['*'])
     * @method Country firstOrNew(array $attributes = [], array $values = [])
     * @method Country firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Country forceCreate(array $attributes)
     * @method _IH_Country_C|Country[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Country_C|Country[] get(array|string $columns = ['*'])
     * @method Country getModel()
     * @method Country[] getModels(array|string $columns = ['*'])
     * @method _IH_Country_C|Country[] hydrate(array $items)
     * @method Country make(array $attributes = [])
     * @method Country newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Country[]|_IH_Country_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Country[]|_IH_Country_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Country sole(array|string $columns = ['*'])
     * @method Country updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Country_QB extends _BaseBuilder {}

    /**
     * @method Currency|null getOrPut($key, $value)
     * @method Currency|$this shift(int $count = 1)
     * @method Currency|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Currency|$this pop(int $count = 1)
     * @method Currency|null pull($key, $default = null)
     * @method Currency|null last(callable $callback = null, $default = null)
     * @method Currency|$this random(int|null $number = null)
     * @method Currency|null sole($key = null, $operator = null, $value = null)
     * @method Currency|null get($key, $default = null)
     * @method Currency|null first(callable $callback = null, $default = null)
     * @method Currency|null firstWhere(string $key, $operator = null, $value = null)
     * @method Currency|null find($key, $default = null)
     * @method Currency[] all()
     */
    class _IH_Currency_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Currency[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_Currency_QB whereId($value)
     * @method _IH_Currency_QB whereNameAr($value)
     * @method _IH_Currency_QB whereNameEn($value)
     * @method _IH_Currency_QB whereCreatedAt($value)
     * @method _IH_Currency_QB whereUpdatedAt($value)
     * @method Currency baseSole(array|string $columns = ['*'])
     * @method Currency create(array $attributes = [])
     * @method _IH_Currency_C|Currency[] cursor()
     * @method Currency|null|_IH_Currency_C|Currency[] find($id, array $columns = ['*'])
     * @method _IH_Currency_C|Currency[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Currency|_IH_Currency_C|Currency[] findOrFail($id, array $columns = ['*'])
     * @method Currency|_IH_Currency_C|Currency[] findOrNew($id, array $columns = ['*'])
     * @method Currency first(array|string $columns = ['*'])
     * @method Currency firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Currency firstOrCreate(array $attributes = [], array $values = [])
     * @method Currency firstOrFail(array $columns = ['*'])
     * @method Currency firstOrNew(array $attributes = [], array $values = [])
     * @method Currency firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Currency forceCreate(array $attributes)
     * @method _IH_Currency_C|Currency[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Currency_C|Currency[] get(array|string $columns = ['*'])
     * @method Currency getModel()
     * @method Currency[] getModels(array|string $columns = ['*'])
     * @method _IH_Currency_C|Currency[] hydrate(array $items)
     * @method Currency make(array $attributes = [])
     * @method Currency newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Currency[]|_IH_Currency_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Currency[]|_IH_Currency_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Currency sole(array|string $columns = ['*'])
     * @method Currency updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Currency_QB extends _BaseBuilder {}

    /**
     * @method MealType|null getOrPut($key, $value)
     * @method MealType|$this shift(int $count = 1)
     * @method MealType|null firstOrFail($key = null, $operator = null, $value = null)
     * @method MealType|$this pop(int $count = 1)
     * @method MealType|null pull($key, $default = null)
     * @method MealType|null last(callable $callback = null, $default = null)
     * @method MealType|$this random(int|null $number = null)
     * @method MealType|null sole($key = null, $operator = null, $value = null)
     * @method MealType|null get($key, $default = null)
     * @method MealType|null first(callable $callback = null, $default = null)
     * @method MealType|null firstWhere(string $key, $operator = null, $value = null)
     * @method MealType|null find($key, $default = null)
     * @method MealType[] all()
     */
    class _IH_MealType_C extends _BaseCollection {
        /**
         * @param int $size
         * @return MealType[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_MealType_QB whereId($value)
     * @method _IH_MealType_QB whereNameAr($value)
     * @method _IH_MealType_QB whereNameEn($value)
     * @method _IH_MealType_QB whereDetailsAr($value)
     * @method _IH_MealType_QB whereDetailsEn($value)
     * @method _IH_MealType_QB wherePackageId($value)
     * @method _IH_MealType_QB whereCreatedAt($value)
     * @method _IH_MealType_QB whereUpdatedAt($value)
     * @method MealType baseSole(array|string $columns = ['*'])
     * @method MealType create(array $attributes = [])
     * @method _IH_MealType_C|MealType[] cursor()
     * @method MealType|null|_IH_MealType_C|MealType[] find($id, array $columns = ['*'])
     * @method _IH_MealType_C|MealType[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method MealType|_IH_MealType_C|MealType[] findOrFail($id, array $columns = ['*'])
     * @method MealType|_IH_MealType_C|MealType[] findOrNew($id, array $columns = ['*'])
     * @method MealType first(array|string $columns = ['*'])
     * @method MealType firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method MealType firstOrCreate(array $attributes = [], array $values = [])
     * @method MealType firstOrFail(array $columns = ['*'])
     * @method MealType firstOrNew(array $attributes = [], array $values = [])
     * @method MealType firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method MealType forceCreate(array $attributes)
     * @method _IH_MealType_C|MealType[] fromQuery(string $query, array $bindings = [])
     * @method _IH_MealType_C|MealType[] get(array|string $columns = ['*'])
     * @method MealType getModel()
     * @method MealType[] getModels(array|string $columns = ['*'])
     * @method _IH_MealType_C|MealType[] hydrate(array $items)
     * @method MealType make(array $attributes = [])
     * @method MealType newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|MealType[]|_IH_MealType_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|MealType[]|_IH_MealType_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method MealType sole(array|string $columns = ['*'])
     * @method MealType updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_MealType_QB extends _BaseBuilder {}

    /**
     * @method Meal|null getOrPut($key, $value)
     * @method Meal|$this shift(int $count = 1)
     * @method Meal|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Meal|$this pop(int $count = 1)
     * @method Meal|null pull($key, $default = null)
     * @method Meal|null last(callable $callback = null, $default = null)
     * @method Meal|$this random(int|null $number = null)
     * @method Meal|null sole($key = null, $operator = null, $value = null)
     * @method Meal|null get($key, $default = null)
     * @method Meal|null first(callable $callback = null, $default = null)
     * @method Meal|null firstWhere(string $key, $operator = null, $value = null)
     * @method Meal|null find($key, $default = null)
     * @method Meal[] all()
     */
    class _IH_Meal_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Meal[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_Meal_QB whereId($value)
     * @method _IH_Meal_QB whereNameAr($value)
     * @method _IH_Meal_QB whereNameEn($value)
     * @method _IH_Meal_QB whereImg($value)
     * @method _IH_Meal_QB whereProtein($value)
     * @method _IH_Meal_QB whereCalories($value)
     * @method _IH_Meal_QB whereFats($value)
     * @method _IH_Meal_QB whereCarbohydrates($value)
     * @method _IH_Meal_QB whereMealTypeId($value)
     * @method _IH_Meal_QB whereCreatedAt($value)
     * @method _IH_Meal_QB whereUpdatedAt($value)
     * @method Meal baseSole(array|string $columns = ['*'])
     * @method Meal create(array $attributes = [])
     * @method _IH_Meal_C|Meal[] cursor()
     * @method Meal|null|_IH_Meal_C|Meal[] find($id, array $columns = ['*'])
     * @method _IH_Meal_C|Meal[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Meal|_IH_Meal_C|Meal[] findOrFail($id, array $columns = ['*'])
     * @method Meal|_IH_Meal_C|Meal[] findOrNew($id, array $columns = ['*'])
     * @method Meal first(array|string $columns = ['*'])
     * @method Meal firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Meal firstOrCreate(array $attributes = [], array $values = [])
     * @method Meal firstOrFail(array $columns = ['*'])
     * @method Meal firstOrNew(array $attributes = [], array $values = [])
     * @method Meal firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Meal forceCreate(array $attributes)
     * @method _IH_Meal_C|Meal[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Meal_C|Meal[] get(array|string $columns = ['*'])
     * @method Meal getModel()
     * @method Meal[] getModels(array|string $columns = ['*'])
     * @method _IH_Meal_C|Meal[] hydrate(array $items)
     * @method Meal make(array $attributes = [])
     * @method Meal newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Meal[]|_IH_Meal_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Meal[]|_IH_Meal_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Meal sole(array|string $columns = ['*'])
     * @method Meal updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Meal_QB extends _BaseBuilder {}

    /**
     * @method OrderSpecial|null getOrPut($key, $value)
     * @method OrderSpecial|$this shift(int $count = 1)
     * @method OrderSpecial|null firstOrFail($key = null, $operator = null, $value = null)
     * @method OrderSpecial|$this pop(int $count = 1)
     * @method OrderSpecial|null pull($key, $default = null)
     * @method OrderSpecial|null last(callable $callback = null, $default = null)
     * @method OrderSpecial|$this random(int|null $number = null)
     * @method OrderSpecial|null sole($key = null, $operator = null, $value = null)
     * @method OrderSpecial|null get($key, $default = null)
     * @method OrderSpecial|null first(callable $callback = null, $default = null)
     * @method OrderSpecial|null firstWhere(string $key, $operator = null, $value = null)
     * @method OrderSpecial|null find($key, $default = null)
     * @method OrderSpecial[] all()
     */
    class _IH_OrderSpecial_C extends _BaseCollection {
        /**
         * @param int $size
         * @return OrderSpecial[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_OrderSpecial_QB whereId($value)
     * @method _IH_OrderSpecial_QB whereUserId($value)
     * @method _IH_OrderSpecial_QB whereMealTypeId($value)
     * @method _IH_OrderSpecial_QB whereComponentId($value)
     * @method _IH_OrderSpecial_QB whereDateOfOrder($value)
     * @method _IH_OrderSpecial_QB whereProtein($value)
     * @method _IH_OrderSpecial_QB whereCreatedAt($value)
     * @method _IH_OrderSpecial_QB whereUpdatedAt($value)
     * @method OrderSpecial baseSole(array|string $columns = ['*'])
     * @method OrderSpecial create(array $attributes = [])
     * @method _IH_OrderSpecial_C|OrderSpecial[] cursor()
     * @method OrderSpecial|null|_IH_OrderSpecial_C|OrderSpecial[] find($id, array $columns = ['*'])
     * @method _IH_OrderSpecial_C|OrderSpecial[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method OrderSpecial|_IH_OrderSpecial_C|OrderSpecial[] findOrFail($id, array $columns = ['*'])
     * @method OrderSpecial|_IH_OrderSpecial_C|OrderSpecial[] findOrNew($id, array $columns = ['*'])
     * @method OrderSpecial first(array|string $columns = ['*'])
     * @method OrderSpecial firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method OrderSpecial firstOrCreate(array $attributes = [], array $values = [])
     * @method OrderSpecial firstOrFail(array $columns = ['*'])
     * @method OrderSpecial firstOrNew(array $attributes = [], array $values = [])
     * @method OrderSpecial firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method OrderSpecial forceCreate(array $attributes)
     * @method _IH_OrderSpecial_C|OrderSpecial[] fromQuery(string $query, array $bindings = [])
     * @method _IH_OrderSpecial_C|OrderSpecial[] get(array|string $columns = ['*'])
     * @method OrderSpecial getModel()
     * @method OrderSpecial[] getModels(array|string $columns = ['*'])
     * @method _IH_OrderSpecial_C|OrderSpecial[] hydrate(array $items)
     * @method OrderSpecial make(array $attributes = [])
     * @method OrderSpecial newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|OrderSpecial[]|_IH_OrderSpecial_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|OrderSpecial[]|_IH_OrderSpecial_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method OrderSpecial sole(array|string $columns = ['*'])
     * @method OrderSpecial updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_OrderSpecial_QB extends _BaseBuilder {}

    /**
     * @method Package|null getOrPut($key, $value)
     * @method Package|$this shift(int $count = 1)
     * @method Package|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Package|$this pop(int $count = 1)
     * @method Package|null pull($key, $default = null)
     * @method Package|null last(callable $callback = null, $default = null)
     * @method Package|$this random(int|null $number = null)
     * @method Package|null sole($key = null, $operator = null, $value = null)
     * @method Package|null get($key, $default = null)
     * @method Package|null first(callable $callback = null, $default = null)
     * @method Package|null firstWhere(string $key, $operator = null, $value = null)
     * @method Package|null find($key, $default = null)
     * @method Package[] all()
     */
    class _IH_Package_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Package[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_Package_QB whereId($value)
     * @method _IH_Package_QB whereNameAr($value)
     * @method _IH_Package_QB whereNameEn($value)
     * @method _IH_Package_QB whereDetailsAr($value)
     * @method _IH_Package_QB whereDetailsEn($value)
     * @method _IH_Package_QB whereStart($value)
     * @method _IH_Package_QB whereEnd($value)
     * @method _IH_Package_QB wherePrice($value)
     * @method _IH_Package_QB whereCurrencyAr($value)
     * @method _IH_Package_QB whereCurrencyEn($value)
     * @method _IH_Package_QB whereType($value)
     * @method _IH_Package_QB whereStatus($value)
     * @method _IH_Package_QB whereCreatedAt($value)
     * @method _IH_Package_QB whereUpdatedAt($value)
     * @method Package baseSole(array|string $columns = ['*'])
     * @method Package create(array $attributes = [])
     * @method _IH_Package_C|Package[] cursor()
     * @method Package|null|_IH_Package_C|Package[] find($id, array $columns = ['*'])
     * @method _IH_Package_C|Package[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Package|_IH_Package_C|Package[] findOrFail($id, array $columns = ['*'])
     * @method Package|_IH_Package_C|Package[] findOrNew($id, array $columns = ['*'])
     * @method Package first(array|string $columns = ['*'])
     * @method Package firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Package firstOrCreate(array $attributes = [], array $values = [])
     * @method Package firstOrFail(array $columns = ['*'])
     * @method Package firstOrNew(array $attributes = [], array $values = [])
     * @method Package firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Package forceCreate(array $attributes)
     * @method _IH_Package_C|Package[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Package_C|Package[] get(array|string $columns = ['*'])
     * @method Package getModel()
     * @method Package[] getModels(array|string $columns = ['*'])
     * @method _IH_Package_C|Package[] hydrate(array $items)
     * @method Package make(array $attributes = [])
     * @method Package newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Package[]|_IH_Package_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Package[]|_IH_Package_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Package sole(array|string $columns = ['*'])
     * @method Package updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Package_QB extends _BaseBuilder {}

    /**
     * @method Setting|null getOrPut($key, $value)
     * @method Setting|$this shift(int $count = 1)
     * @method Setting|null firstOrFail($key = null, $operator = null, $value = null)
     * @method Setting|$this pop(int $count = 1)
     * @method Setting|null pull($key, $default = null)
     * @method Setting|null last(callable $callback = null, $default = null)
     * @method Setting|$this random(int|null $number = null)
     * @method Setting|null sole($key = null, $operator = null, $value = null)
     * @method Setting|null get($key, $default = null)
     * @method Setting|null first(callable $callback = null, $default = null)
     * @method Setting|null firstWhere(string $key, $operator = null, $value = null)
     * @method Setting|null find($key, $default = null)
     * @method Setting[] all()
     */
    class _IH_Setting_C extends _BaseCollection {
        /**
         * @param int $size
         * @return Setting[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_Setting_QB whereId($value)
     * @method _IH_Setting_QB whereLocationAr($value)
     * @method _IH_Setting_QB whereLocationEn($value)
     * @method _IH_Setting_QB whereNameAr($value)
     * @method _IH_Setting_QB whereNameEn($value)
     * @method _IH_Setting_QB whereAboutAr($value)
     * @method _IH_Setting_QB whereAboutEn($value)
     * @method _IH_Setting_QB wherePrivacyAr($value)
     * @method _IH_Setting_QB wherePrivacyEn($value)
     * @method _IH_Setting_QB whereTermsAr($value)
     * @method _IH_Setting_QB whereTermsEn($value)
     * @method _IH_Setting_QB whereFacebook($value)
     * @method _IH_Setting_QB whereWhatsapp($value)
     * @method _IH_Setting_QB whereSnapchat($value)
     * @method _IH_Setting_QB whereCreatedAt($value)
     * @method _IH_Setting_QB whereUpdatedAt($value)
     * @method Setting baseSole(array|string $columns = ['*'])
     * @method Setting create(array $attributes = [])
     * @method _IH_Setting_C|Setting[] cursor()
     * @method Setting|null|_IH_Setting_C|Setting[] find($id, array $columns = ['*'])
     * @method _IH_Setting_C|Setting[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method Setting|_IH_Setting_C|Setting[] findOrFail($id, array $columns = ['*'])
     * @method Setting|_IH_Setting_C|Setting[] findOrNew($id, array $columns = ['*'])
     * @method Setting first(array|string $columns = ['*'])
     * @method Setting firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method Setting firstOrCreate(array $attributes = [], array $values = [])
     * @method Setting firstOrFail(array $columns = ['*'])
     * @method Setting firstOrNew(array $attributes = [], array $values = [])
     * @method Setting firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method Setting forceCreate(array $attributes)
     * @method _IH_Setting_C|Setting[] fromQuery(string $query, array $bindings = [])
     * @method _IH_Setting_C|Setting[] get(array|string $columns = ['*'])
     * @method Setting getModel()
     * @method Setting[] getModels(array|string $columns = ['*'])
     * @method _IH_Setting_C|Setting[] hydrate(array $items)
     * @method Setting make(array $attributes = [])
     * @method Setting newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|Setting[]|_IH_Setting_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|Setting[]|_IH_Setting_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Setting sole(array|string $columns = ['*'])
     * @method Setting updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_Setting_QB extends _BaseBuilder {}

    /**
     * @method User|null getOrPut($key, $value)
     * @method User|$this shift(int $count = 1)
     * @method User|null firstOrFail($key = null, $operator = null, $value = null)
     * @method User|$this pop(int $count = 1)
     * @method User|null pull($key, $default = null)
     * @method User|null last(callable $callback = null, $default = null)
     * @method User|$this random(int|null $number = null)
     * @method User|null sole($key = null, $operator = null, $value = null)
     * @method User|null get($key, $default = null)
     * @method User|null first(callable $callback = null, $default = null)
     * @method User|null firstWhere(string $key, $operator = null, $value = null)
     * @method User|null find($key, $default = null)
     * @method User[] all()
     */
    class _IH_User_C extends _BaseCollection {
        /**
         * @param int $size
         * @return User[][]
         */
        public function chunk($size)
        {
            return [];
        }
    }

    /**
     * @method _IH_User_QB whereId($value)
     * @method _IH_User_QB whereImg($value)
     * @method _IH_User_QB whereNameAr($value)
     * @method _IH_User_QB whereNameEn($value)
     * @method _IH_User_QB whereEmail($value)
     * @method _IH_User_QB whereEmailVerifiedAt($value)
     * @method _IH_User_QB wherePassword($value)
     * @method _IH_User_QB whereLocationAr($value)
     * @method _IH_User_QB whereLocationEn($value)
     * @method _IH_User_QB wherePhone($value)
     * @method _IH_User_QB whereCountryId($value)
     * @method _IH_User_QB whereIsActive($value)
     * @method _IH_User_QB whereRememberToken($value)
     * @method _IH_User_QB whereCreatedAt($value)
     * @method _IH_User_QB whereUpdatedAt($value)
     * @method User baseSole(array|string $columns = ['*'])
     * @method User create(array $attributes = [])
     * @method _IH_User_C|User[] cursor()
     * @method User|null|_IH_User_C|User[] find($id, array $columns = ['*'])
     * @method _IH_User_C|User[] findMany(array|Arrayable $ids, array $columns = ['*'])
     * @method User|_IH_User_C|User[] findOrFail($id, array $columns = ['*'])
     * @method User|_IH_User_C|User[] findOrNew($id, array $columns = ['*'])
     * @method User first(array|string $columns = ['*'])
     * @method User firstOr(array|\Closure $columns = ['*'], \Closure $callback = null)
     * @method User firstOrCreate(array $attributes = [], array $values = [])
     * @method User firstOrFail(array $columns = ['*'])
     * @method User firstOrNew(array $attributes = [], array $values = [])
     * @method User firstWhere(array|\Closure|Expression|string $column, $operator = null, $value = null, string $boolean = 'and')
     * @method User forceCreate(array $attributes)
     * @method _IH_User_C|User[] fromQuery(string $query, array $bindings = [])
     * @method _IH_User_C|User[] get(array|string $columns = ['*'])
     * @method User getModel()
     * @method User[] getModels(array|string $columns = ['*'])
     * @method _IH_User_C|User[] hydrate(array $items)
     * @method User make(array $attributes = [])
     * @method User newModelInstance(array $attributes = [])
     * @method LengthAwarePaginator|User[]|_IH_User_C paginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method Paginator|User[]|_IH_User_C simplePaginate(int|null $perPage = null, array $columns = ['*'], string $pageName = 'page', int|null $page = null)
     * @method User sole(array|string $columns = ['*'])
     * @method User updateOrCreate(array $attributes, array $values = [])
     */
    class _IH_User_QB extends _BaseBuilder {}
}
