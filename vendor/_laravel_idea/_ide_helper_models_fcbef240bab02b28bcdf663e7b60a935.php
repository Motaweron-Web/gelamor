<?php //8fcfb2476f4efaa5bb306209f0fbc00b
/** @noinspection all */

namespace App\Models {

    use Database\Factories\UserFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;
    use Illuminate\Database\Eloquent\Relations\HasMany;
    use Illuminate\Database\Eloquent\Relations\MorphToMany;
    use Illuminate\Notifications\DatabaseNotification;
    use Illuminate\Notifications\DatabaseNotificationCollection;
    use Illuminate\Support\Carbon;
    use Laravel\Sanctum\PersonalAccessToken;
    use LaravelIdea\Helper\App\Models\_IH_Admin_C;
    use LaravelIdea\Helper\App\Models\_IH_Admin_QB;
    use LaravelIdea\Helper\App\Models\_IH_Category_C;
    use LaravelIdea\Helper\App\Models\_IH_Category_QB;
    use LaravelIdea\Helper\App\Models\_IH_Chef_C;
    use LaravelIdea\Helper\App\Models\_IH_Chef_QB;
    use LaravelIdea\Helper\App\Models\_IH_Component_C;
    use LaravelIdea\Helper\App\Models\_IH_Component_QB;
    use LaravelIdea\Helper\App\Models\_IH_ContactUs_C;
    use LaravelIdea\Helper\App\Models\_IH_ContactUs_QB;
    use LaravelIdea\Helper\App\Models\_IH_Country_C;
    use LaravelIdea\Helper\App\Models\_IH_Country_QB;
    use LaravelIdea\Helper\App\Models\_IH_Currency_C;
    use LaravelIdea\Helper\App\Models\_IH_Currency_QB;
    use LaravelIdea\Helper\App\Models\_IH_MealType_C;
    use LaravelIdea\Helper\App\Models\_IH_MealType_QB;
    use LaravelIdea\Helper\App\Models\_IH_Meal_C;
    use LaravelIdea\Helper\App\Models\_IH_Meal_QB;
    use LaravelIdea\Helper\App\Models\_IH_OrderSpecial_C;
    use LaravelIdea\Helper\App\Models\_IH_OrderSpecial_QB;
    use LaravelIdea\Helper\App\Models\_IH_Package_C;
    use LaravelIdea\Helper\App\Models\_IH_Package_QB;
    use LaravelIdea\Helper\App\Models\_IH_Setting_C;
    use LaravelIdea\Helper\App\Models\_IH_Setting_QB;
    use LaravelIdea\Helper\App\Models\_IH_User_C;
    use LaravelIdea\Helper\App\Models\_IH_User_QB;
    use LaravelIdea\Helper\Illuminate\Notifications\_IH_DatabaseNotification_QB;
    use LaravelIdea\Helper\Laravel\Sanctum\_IH_PersonalAccessToken_C;
    use LaravelIdea\Helper\Laravel\Sanctum\_IH_PersonalAccessToken_QB;

    /**
     * @property int $id
     * @property string $name
     * @property string $email
     * @property string $password
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Admin_QB onWriteConnection()
     * @method _IH_Admin_QB newQuery()
     * @method static _IH_Admin_QB on(null|string $connection = null)
     * @method static _IH_Admin_QB query()
     * @method static _IH_Admin_QB with(array|string $relations)
     * @method _IH_Admin_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Admin_C|Admin[] all()
     * @mixin _IH_Admin_QB
     */
    class Admin extends Model {}

    /**
     * @property int $id
     * @property string $name_ar
     * @property string $name_en
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Category_QB onWriteConnection()
     * @method _IH_Category_QB newQuery()
     * @method static _IH_Category_QB on(null|string $connection = null)
     * @method static _IH_Category_QB query()
     * @method static _IH_Category_QB with(array|string $relations)
     * @method _IH_Category_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Category_C|Category[] all()
     * @mixin _IH_Category_QB
     */
    class Category extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property string $email
     * @property string $password
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Chef_QB onWriteConnection()
     * @method _IH_Chef_QB newQuery()
     * @method static _IH_Chef_QB on(null|string $connection = null)
     * @method static _IH_Chef_QB query()
     * @method static _IH_Chef_QB with(array|string $relations)
     * @method _IH_Chef_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Chef_C|Chef[] all()
     * @mixin _IH_Chef_QB
     */
    class Chef extends Model {}

    /**
     * @property int $id
     * @property string|null $img
     * @property string $name_ar
     * @property string $name_en
     * @property int $protein
     * @property int $calories
     * @property int $fats
     * @property int $carbohydrates
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _IH_Meal_C|Meal[] $meal
     * @property-read int $meal_count
     * @method BelongsToMany|_IH_Meal_QB meal()
     * @property _IH_OrderSpecial_C|OrderSpecial[] $order_special
     * @property-read int $order_special_count
     * @method HasMany|_IH_OrderSpecial_QB order_special()
     * @method static _IH_Component_QB onWriteConnection()
     * @method _IH_Component_QB newQuery()
     * @method static _IH_Component_QB on(null|string $connection = null)
     * @method static _IH_Component_QB query()
     * @method static _IH_Component_QB with(array|string $relations)
     * @method _IH_Component_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Component_C|Component[] all()
     * @foreignLinks id,\App\Models\OrderSpecial,component_id
     * @mixin _IH_Component_QB
     */
    class Component extends Model {}

    /**
     * @property int $id
     * @property string $name
     * @property string $email
     * @property string $subject
     * @property string $message
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_ContactUs_QB onWriteConnection()
     * @method _IH_ContactUs_QB newQuery()
     * @method static _IH_ContactUs_QB on(null|string $connection = null)
     * @method static _IH_ContactUs_QB query()
     * @method static _IH_ContactUs_QB with(array|string $relations)
     * @method _IH_ContactUs_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_ContactUs_C|ContactUs[] all()
     * @mixin _IH_ContactUs_QB
     */
    class ContactUs extends Model {}

    /**
     * @property int $id
     * @property string $name_ar
     * @property string $name_en
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Country_QB onWriteConnection()
     * @method _IH_Country_QB newQuery()
     * @method static _IH_Country_QB on(null|string $connection = null)
     * @method static _IH_Country_QB query()
     * @method static _IH_Country_QB with(array|string $relations)
     * @method _IH_Country_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Country_C|Country[] all()
     * @foreignLinks id,\App\Models\User,country_id
     * @mixin _IH_Country_QB
     */
    class Country extends Model {}

    /**
     * @property int $id
     * @property string $name_ar
     * @property string $name_en
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Currency_QB onWriteConnection()
     * @method _IH_Currency_QB newQuery()
     * @method static _IH_Currency_QB on(null|string $connection = null)
     * @method static _IH_Currency_QB query()
     * @method static _IH_Currency_QB with(array|string $relations)
     * @method _IH_Currency_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Currency_C|Currency[] all()
     * @mixin _IH_Currency_QB
     */
    class Currency extends Model {}

    /**
     * @property int $id
     * @property string $name_ar
     * @property string $name_en
     * @property string $img
     * @property int $protein
     * @property int $calories
     * @property int $Fats
     * @property int $carbohydrates
     * @property int $meal_type_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _IH_Component_C|Component[] $component
     * @property-read int $component_count
     * @method BelongsToMany|_IH_Component_QB component()
     * @property MealType $meal_type
     * @method BelongsTo|_IH_MealType_QB meal_type()
     * @property _IH_User_C|User[] $user
     * @property-read int $user_count
     * @method BelongsToMany|_IH_User_QB user()
     * @method static _IH_Meal_QB onWriteConnection()
     * @method _IH_Meal_QB newQuery()
     * @method static _IH_Meal_QB on(null|string $connection = null)
     * @method static _IH_Meal_QB query()
     * @method static _IH_Meal_QB with(array|string $relations)
     * @method _IH_Meal_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Meal_C|Meal[] all()
     * @ownLinks meal_type_id,\App\Models\MealType,id
     * @foreignLinks
     * @mixin _IH_Meal_QB
     */
    class Meal extends Model {}

    /**
     * @property int $id
     * @property string $name_ar
     * @property string $name_en
     * @property string|null $details_ar
     * @property string|null $details_en
     * @property int $package_id
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _IH_Meal_C|Meal[] $meals
     * @property-read int $meals_count
     * @method HasMany|_IH_Meal_QB meals()
     * @property _IH_OrderSpecial_C|OrderSpecial[] $order_special
     * @property-read int $order_special_count
     * @method HasMany|_IH_OrderSpecial_QB order_special()
     * @property Package $package
     * @method BelongsTo|_IH_Package_QB package()
     * @method static _IH_MealType_QB onWriteConnection()
     * @method _IH_MealType_QB newQuery()
     * @method static _IH_MealType_QB on(null|string $connection = null)
     * @method static _IH_MealType_QB query()
     * @method static _IH_MealType_QB with(array|string $relations)
     * @method _IH_MealType_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_MealType_C|MealType[] all()
     * @ownLinks package_id,\App\Models\Package,id
     * @foreignLinks id,\App\Models\Meal,meal_type_id|id,\App\Models\OrderSpecial,meal_type_id
     * @mixin _IH_MealType_QB
     */
    class MealType extends Model {}

    /**
     * @property int $id
     * @property int $user_id
     * @property int $meal_type_id
     * @property int $component_id
     * @property Carbon $date_of_order
     * @property int $protein
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property Component $component
     * @method BelongsTo|_IH_Component_QB component()
     * @property MealType $meal_type
     * @method BelongsTo|_IH_MealType_QB meal_type()
     * @property User $user
     * @method BelongsTo|_IH_User_QB user()
     * @method static _IH_OrderSpecial_QB onWriteConnection()
     * @method _IH_OrderSpecial_QB newQuery()
     * @method static _IH_OrderSpecial_QB on(null|string $connection = null)
     * @method static _IH_OrderSpecial_QB query()
     * @method static _IH_OrderSpecial_QB with(array|string $relations)
     * @method _IH_OrderSpecial_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_OrderSpecial_C|OrderSpecial[] all()
     * @ownLinks meal_type_id,\App\Models\MealType,id|user_id,\App\Models\User,id|component_id,\App\Models\Component,id
     * @mixin _IH_OrderSpecial_QB
     */
    class OrderSpecial extends Model {}

    /**
     * @property int $id
     * @property string $name_ar
     * @property string $name_en
     * @property string|null $details_ar
     * @property string|null $details_en
     * @property Carbon $start
     * @property Carbon $end
     * @property float $price
     * @property string $currency_ar
     * @property string $currency_en
     * @property string $type
     * @property string $status
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _IH_MealType_C|MealType[] $meal_type
     * @property-read int $meal_type_count
     * @method HasMany|_IH_MealType_QB meal_type()
     * @method static _IH_Package_QB onWriteConnection()
     * @method _IH_Package_QB newQuery()
     * @method static _IH_Package_QB on(null|string $connection = null)
     * @method static _IH_Package_QB query()
     * @method static _IH_Package_QB with(array|string $relations)
     * @method _IH_Package_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Package_C|Package[] all()
     * @foreignLinks id,\App\Models\MealType,package_id
     * @mixin _IH_Package_QB
     */
    class Package extends Model {}

    /**
     * @property int $id
     * @property string|null $location_ar
     * @property string|null $location_en
     * @property string|null $name_ar
     * @property string|null $name_en
     * @property string|null $about_ar
     * @property string|null $about_en
     * @property string|null $privacy_ar
     * @property string|null $privacy_en
     * @property string|null $terms_ar
     * @property string|null $terms_en
     * @property string|null $facebook
     * @property string|null $whatsapp
     * @property string|null $snapchat
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @method static _IH_Setting_QB onWriteConnection()
     * @method _IH_Setting_QB newQuery()
     * @method static _IH_Setting_QB on(null|string $connection = null)
     * @method static _IH_Setting_QB query()
     * @method static _IH_Setting_QB with(array|string $relations)
     * @method _IH_Setting_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_Setting_C|Setting[] all()
     * @mixin _IH_Setting_QB
     */
    class Setting extends Model {}

    /**
     * @property int $id
     * @property string|null $img
     * @property string $name_ar
     * @property string $name_en
     * @property string $email
     * @property Carbon|null $email_verified_at
     * @property string $password
     * @property string $location_ar
     * @property string $location_en
     * @property string $phone
     * @property int $country_id
     * @property bool $is_active
     * @property string|null $remember_token
     * @property Carbon|null $created_at
     * @property Carbon|null $updated_at
     * @property _IH_Meal_C|Meal[] $meal
     * @property-read int $meal_count
     * @method BelongsToMany|_IH_Meal_QB meal()
     * @property DatabaseNotificationCollection|DatabaseNotification[] $notifications
     * @property-read int $notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB notifications()
     * @property _IH_OrderSpecial_C|OrderSpecial[] $order_special
     * @property-read int $order_special_count
     * @method HasMany|_IH_OrderSpecial_QB order_special()
     * @property DatabaseNotificationCollection|DatabaseNotification[] $readNotifications
     * @property-read int $read_notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB readNotifications()
     * @property _IH_PersonalAccessToken_C|PersonalAccessToken[] $tokens
     * @property-read int $tokens_count
     * @method MorphToMany|_IH_PersonalAccessToken_QB tokens()
     * @property DatabaseNotificationCollection|DatabaseNotification[] $unreadNotifications
     * @property-read int $unread_notifications_count
     * @method MorphToMany|_IH_DatabaseNotification_QB unreadNotifications()
     * @method static _IH_User_QB onWriteConnection()
     * @method _IH_User_QB newQuery()
     * @method static _IH_User_QB on(null|string $connection = null)
     * @method static _IH_User_QB query()
     * @method static _IH_User_QB with(array|string $relations)
     * @method _IH_User_QB newModelQuery()
     * @method false|int increment(string $column, float|int $amount = 1, array $extra = [])
     * @method false|int decrement(string $column, float|int $amount = 1, array $extra = [])
     * @method static _IH_User_C|User[] all()
     * @ownLinks country_id,\App\Models\Country,id
     * @foreignLinks id,\App\Models\OrderSpecial,user_id
     * @mixin _IH_User_QB
     * @method static UserFactory factory(...$parameters)
     */
    class User extends Model {}
}
