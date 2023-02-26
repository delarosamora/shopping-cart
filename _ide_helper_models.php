<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\CartStatus
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|CartStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CartStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|CartStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CartStatus whereName($value)
 */
	class CartStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShoppingCart> $shopping_cart
 * @property-read int|null $shopping_cart_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ProductShoppingCart
 *
 * @property int $id
 * @property int $product_id
 * @property int $shopping_cart_id
 * @property int $quantity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductShoppingCart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductShoppingCart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductShoppingCart query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductShoppingCart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductShoppingCart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductShoppingCart whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductShoppingCart whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductShoppingCart whereShoppingCartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductShoppingCart whereUpdatedAt($value)
 */
	class ProductShoppingCart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ShoppingCart
 *
 * @property int $id
 * @property int|null $client_id
 * @property int $status_id
 * @property string $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ShoppingCartClient|null $client
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\CartStatus $status
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCart whereUpdatedAt($value)
 */
	class ShoppingCart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ShoppingCartClient
 *
 * @property int $id
 * @property string $name
 * @property string $street
 * @property string $number
 * @property int $postal_code
 * @property string $city
 * @property string $province
 * @property string $country
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient wherePostalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShoppingCartClient whereUpdatedAt($value)
 */
	class ShoppingCartClient extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

