# Post-redirect-get flow problem
Post-redirect-get flow problem in Laravel when using parallel AJAX request and flash session data.

## The problem

"POST-1" request flashes data to session and redirects to "GET-1". "GET-1" takes the data and generates view.

If another "POST-2" request is executed while "redirect" phase, it resets all flash data, generated by "POST-1", and puts its own.

If flashed parameters names a the same, the "GET-1" recieves wrong value. If "POST-2" puth its own parameters, "GET-1" recieves "null" and generates error.

The package for Laravel helps to reproduce this problem.

## Insall

In Laravel project forder execute commands (can be new or existing project, chenges are easily removed)
```
composer config repositories vcs https://github.com/DecideNowLib/prg-problem.git
composer require decidenowlib/prg-problem:dev-master
```
Add ServiceProvider to **config/app.php**
```
...
'providers' => [
   ...
   DecideNowLib\PRGProblem\PRGProblemServiceProvider::class,
   ...
],
...
```

## The Test
The application must increase counter value on every button push.

When page is refreshed the counter value must be reset to zero.

## Reproduce problem
1. In your browser go to
```
http://path-to-application/prg-problem
```

2. Select one of two tests.

3. Go to "Open break page" (link after "Increment" button). New tab will be opened.
_The page sends post requests to increment counter every 1 second._

4. Return to test page tab.

5. Push "Increment" button several times.

* on "classic flow" test counter value will be increased on every button push (**expected**), but "refresh" and "back" browser buttons will give bad values (the same value on "refresh" and old values on "back" button) (**unexpected**).
* on "post-redirect-get" test value will be sometimes taken from neighbour "breaking" tab (**unexpected**), but every refresh will set counter value to zero (**expected**). If "breaking" tab is not opened application acts as desired! (**expected**)
