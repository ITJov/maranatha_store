    <?php

    use Haruncpi\LaravelIdGenerator\IdGenerator;
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('users', function (Blueprint $table) {
                $table->string('id', 10)->primary();
                $table->string('name', 255)->unique();
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->string('role_id', 2);
                $table->foreign('role_id')->references('id')->on('role')->onDelete('restrict');
                $table->rememberToken();
                $table->timestamps();
            });

            // Generate unique ID for the user
            $id = IdGenerator::generate(['table' => 'users', 'length' => 10, 'prefix' => 'PGN-']);

            // Get role_id for 'admin' role
            $role_id = DB::table('role')->where('nama_role', 'admin')->value('id');

            // Insert user if the role 'admin' exists
            if ($role_id) {
                DB::table('users')->insert([
                    [
                        'id' => $id,
                        'name' => 'admin',
                        'email' => 'admin@gmail.com',
                        'password' => Hash::make('admin'),
                        'role_id' => $role_id,
                    ]
                ]);
            } else {
                throw new Exception("Role 'admin' tidak ditemukan di tabel role");
            }
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('users');
        }
    };
