<?php

function active_class($path, $active = 'active')
{
  return call_user_func_array('Request::is', (array) $path) ? $active : '';
}

function is_active_route($path)
{
  return call_user_func_array('Request::is', (array) $path) ? 'true' : 'false';
}

function show_class($path)
{
  return call_user_func_array('Request::is', (array) $path) ? 'show' : '';
}

function getJobId($uuid)
{
  return App\Models\Job::where('uuid', $uuid)->first();
}

function getUnitId($uuid)
{
  return App\Models\Unit::where('uuid', $uuid)->first();
}
