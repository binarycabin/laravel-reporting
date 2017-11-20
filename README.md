# Laravel-Reporting
Basic tools for building reports

## Available Traits

### \BinaryCabin\LaravelReporting\Traits\Sortable

Provides a scope to pass sortable values to a query:

```
// (/users?sort=last_name&sort_order=ASC)
$users = \App\User::sort($request->all())->get();
```

On your model, add the properties below to set the default sorting when none is passed:

protected $sortFieldDefault = 'id';
protected $sortOrderDefault = 'ASC';

### \BinaryCabin\LaravelReporting\Traits\Filterable

Provides scopes to add filtering to your query:

```
\App\User::filter($request->all())->get();
```

On your model, add a filterable property to determine all columns allowed to be filtered:

```
protected $filterable = [
        'first_name',
        'last_name',
        'global',
];
```

If a scope with the filterable name exists, it will be used in the filter. A scope "global" is provided in the trait. This will look through all fields in your "filterableGlobal" array for the passed query 

```
    protected $filterableGlobal = [
        'first_name',
        'company',
    ];
```

```
\App\User::filter(['global'=>'ABC Company'])->get();
```

## Available Views

A sortable button is included to pass the "sort" and "sort_order" request values when viewing a table:

```
<th>@include('reporting::components.sort-button',['sortField'=>'created_at']) Date Created</th>
```

## Available Controllers

An extendable controller is also available, which provides basic CRUD operation, along with default Sort/Filter functionality. To use this controller, simply create a controller extending it and passing available properties shown below:

```
<?php

namespace App\Http\Controllers\Manage\Users;

use BinaryCabin\LaravelReporting\Http\Controllers\BaseManageController;

class UserController extends BaseManageController
{

    protected $modelClass = \App\User::class;
    protected $baseTitlePlural = 'Users';
    protected $baseTitleSingular = 'User';
    protected $variableNamePlural = 'users';
    protected $variableNameSingular = 'user';
    protected $baseRoute = 'manage/user';
    protected $viewIndex = 'manage.user.index';
    protected $viewCreate='manage.user.create';
    protected $viewEdit='manage.user.edit';

}

```