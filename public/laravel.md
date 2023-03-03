# 模型

- 集合：是一个对象，对象中有数组属性，用于存放多个模型

路由或控制器返回 模型/模型集合 实例时，laravel会自动转换为JSON
若想返回自定义格式，可在中间加一层资源类
app/Http/Resources

# 生成资源处理单个模型
 php artisan make:resource Admin 
# 生成资源集合处理模型集合
php artisan make:resource Admins --collection
php artisan make:resource AdminCollection

# 禁用顶层资源包裹 去掉默认data键 AppServiceProvider
use Illuminate\Http\Resources\Json\Resource;
Resource::withoutWrapping();

