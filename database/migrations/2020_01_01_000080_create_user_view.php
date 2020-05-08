<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateUserView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_view');
    }

    private function createView(): string
    {
        return <<<SQL
CREATE VIEW user_view AS
SELECT
	u.id as id,
    p.id as person_id,
    u.indicator_id as indicator_id,
    u.username as username,
    u.email as email,
    p.first_name as first_name,
    p.last_name as last_name,
    p.avatar as avatar,
    p.birth_date as birth_date,
    p.type as person_type,
    m.contract_read as contract_read,
    m.graduate as graduate,
    m.status as membership_status,
    u.status as user_status,
    u.access_profile as access_profile,
    u.active_at as active_at,
    u.created_at as create_at,
    u.updated_at as update_at,
    u.deleted_at as deleted_at,
    CASE WHEN u.access_profile = 'Superuser' THEN TRUE ELSE FALSE END AS is_superuser,
    CASE WHEN u.access_profile = 'Admin' THEN TRUE ELSE FALSE END AS is_admin,
    CASE WHEN u.access_profile = 'Root' THEN TRUE ELSE FALSE END AS is_root,
    CASE WHEN u.access_profile != 'Superuser' AND u.access_profile != 'Admin' AND u.access_profile != 'Root' THEN TRUE ELSE FALSE END AS is_user
FROM user as u
INNER JOIN person as p ON p.user_id = u.id
INNER JOIN membership as m ON m.person_id = p.id;
SQL;
    }

}
