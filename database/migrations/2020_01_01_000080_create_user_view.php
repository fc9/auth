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
	u.uuid as uuid,
    p.id as person_id,
    u.indicator_id as indicator_id,
    i.uuid as indicator_uuid,
    u.username as username,
    u.email as email,
    u.email_verified_at as email_verified_at,
    p.first_name as first_name,
    p.last_name as last_name,
    p.avatar as avatar,
    p.birth_date as birth_date,
    p.type as person_type,
    m.contract_read as contract_read,
    m.graduate as graduate,
    m.status as membership_status,
    u.status as user_status,
    u.created_at as create_at,
    u.active_at as active_at,
    u.updated_at as update_at,
    u.deleted_at as deleted_at
FROM user as u
INNER JOIN person as p ON p.user_id = u.id
INNER JOIN membership as m ON m.person_id = p.id
LEFT JOIN (SELECT id, uuid FROM Auth.user) as i ON i.id = u.indicator_id OR i.id = null;
SQL;
    }

}
