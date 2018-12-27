<?php  

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use App\Scopes\Facade\TenantManagerFacade;


class TenantScope implements Scope
{
	 protected $tenant;

    /**
     * Create the scope.
     *
     * @param Model $tenant [description]
     */
   

	public function apply(Builder $builder, Model $model)
	{

		// dd(TenantManagerFacade::tm());
		$tenantId = TenantManagerFacade::getTenantKey();

		$builder->where('tenant_id', $tenantId);
	}

}
