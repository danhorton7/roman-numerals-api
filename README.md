# Roman Numerals Tech Task
My submission for the tech task for YPS.

## My explanation
- Implemented a single-action controller for invoking the conversion method API.
- Conversion logic in a dedicated service class.
- Used a readonly class property for the lookup table of Roman Numerals to integers, to allow future proofing protection of the property to ensure immutability and prevent accidental modification.
- Could have created the lookupTable as an Enum, however to avoid over-engineering I decided not to implement this.
- Used a request class to outsource the validation to another file, allowing separation of concerns.
- Return as an API resource collection, which allows consistent formatting and returns a known structure.
- Stats are implemented as 2 methods in the Stats controller. Additional functionality would mean that this implementation would need to be re-visited to prevent bloating with 100s of methods in the class.

## Running the Project
- Clone the repository.
- Install dependencies with `composer install`.
- Run migrations with `php artisan migrate`.
- Seed the database with `php artisan db:seed`.
- Start the server with `php artisan serve`.
- Run tests with `php artisan test`.
