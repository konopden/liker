#### Installation
config/app.php
```
// add to providers
Dk\Liker\LikerServiceProvider::class
```
Publish the migrations:
```
php artisan vendor:publish --provider="Dk\Liker\LikerServiceProvider" --tag="migrations"
php artisan migrate
```
Usage:
```php
use Dk\Liker\LikeOpportunity;

class Comment extends Model
{
    use LikeOpportunity;
}
```

```php
use Dk\Liker\Like;

class User extends Authenticatable
{
    use Like;
}
```

Examples:
```php
$comment = Comment::find(1);
$user = User::find(1);

$user->like($comment);

$comment->countAllRatings();
```
