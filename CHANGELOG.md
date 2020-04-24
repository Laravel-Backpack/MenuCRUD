# Changelog

All Notable changes to `MenuCRUD` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

-------------

## 2.0.5 - 2020-04-24

### Added
- support for PageManager 3.x;


## 2.0.4 - 2020-04-24

### Added
- support for Backpack 4.1;


## 2.0.3 - 2020-03-05

### Fixed
- upgraded PHPUnit;


## 2.0.2 - 2019-10-04

### Fixed
- page_or_link field not storing the link;


## 2.0.1 - 2019-09-25

### Fixed
- routes not registering sometimes because no fallback was provided to base config variables;


## 2.0.0 - 2019-09-24

### Added
- support for Backpack v4;

### Removed
- support for Backpack v3;

-------------


## 1.0.14 - 2019-09-04

### Added
- support for Laravel 6;


## 1.0.13 - 2017-11-29

### Added
- package auto-discovery;


## 1.0.12 - 2017-07-06

### Fixed
- overwritable routes file;


## 1.0.11 - 2017-07-05

### Fixed
- Check for page existence before outputing its URL;


## 1.0.10 - 2017-04-05

### Added
- Backpack/PageManager dependency in composer.json;


## 1.0.9 - 2016-10-30

### Fixed
- admin prefix now uses the config value from backpack/base;


## 1.0.8 - 2016-07-31

### Fixed
- Working bogus unit tests.



## 1.0.6 - 2016-07-31

### Added
- Bogus unit tests. At least we'be able to use travis-ci for requirements errors, until full unit tests are done.


## 1.0.5 - 2016-07-24

### Added
- Fixed MenuItem children relationship.
- Switched to the 'admin' middleware for the routes.


## 1.0.4 - 2016-07-23

### Added
- Backpack\CRUD 3.0 dependency.


## 1.0.3 - 2016-06-13

### Fixed
- Migration file had double extension (.php.php);


## 1.0.2 - 2016-05-26

### Fixed
- Renamed to MenuCRUD;


## 1.0.1 - 2016-05-26

### Fixed
- Moved routes into MenuManagerServiceProvider so that the package could be easily downloaded from github and pasted over working project.


## 1.0.0 - 2016-05-26

### Added
- Initial code.
