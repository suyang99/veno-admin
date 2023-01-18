<?php

/**
 * A helper file for Dcat Admin, to provide autocomplete information to your IDE
 *
 * This file should not be included in your code, only analyzed by your IDE!
 *
 * @author jqh <841324345@qq.com>
 */
namespace Dcat\Admin {
    use Illuminate\Support\Collection;

    /**
     * @property Grid\Column|Collection status
     * @property Grid\Column|Collection id
     * @property Grid\Column|Collection name
     * @property Grid\Column|Collection type
     * @property Grid\Column|Collection version
     * @property Grid\Column|Collection detail
     * @property Grid\Column|Collection created_at
     * @property Grid\Column|Collection updated_at
     * @property Grid\Column|Collection is_enabled
     * @property Grid\Column|Collection parent_id
     * @property Grid\Column|Collection order
     * @property Grid\Column|Collection icon
     * @property Grid\Column|Collection uri
     * @property Grid\Column|Collection extension
     * @property Grid\Column|Collection permission_id
     * @property Grid\Column|Collection menu_id
     * @property Grid\Column|Collection slug
     * @property Grid\Column|Collection http_method
     * @property Grid\Column|Collection http_path
     * @property Grid\Column|Collection role_id
     * @property Grid\Column|Collection user_id
     * @property Grid\Column|Collection value
     * @property Grid\Column|Collection username
     * @property Grid\Column|Collection password
     * @property Grid\Column|Collection avatar
     * @property Grid\Column|Collection remember_token
     * @property Grid\Column|Collection invitation_code
     * @property Grid\Column|Collection metro
     * @property Grid\Column|Collection content
     * @property Grid\Column|Collection image
     * @property Grid\Column|Collection image_route
     * @property Grid\Column|Collection account_name
     * @property Grid\Column|Collection account_num
     * @property Grid\Column|Collection ifsc
     * @property Grid\Column|Collection upi
     * @property Grid\Column|Collection deleted_at
     * @property Grid\Column|Collection configs
     * @property Grid\Column|Collection key
     * @property Grid\Column|Collection input_type
     * @property Grid\Column|Collection remark
     * @property Grid\Column|Collection uuid
     * @property Grid\Column|Collection connection
     * @property Grid\Column|Collection queue
     * @property Grid\Column|Collection payload
     * @property Grid\Column|Collection exception
     * @property Grid\Column|Collection failed_at
     * @property Grid\Column|Collection symbol
     * @property Grid\Column|Collection period
     * @property Grid\Column|Collection size
     * @property Grid\Column|Collection direction
     * @property Grid\Column|Collection migration
     * @property Grid\Column|Collection batch
     * @property Grid\Column|Collection goods_id
     * @property Grid\Column|Collection order_num
     * @property Grid\Column|Collection amount
     * @property Grid\Column|Collection gain
     * @property Grid\Column|Collection opening
     * @property Grid\Column|Collection closing
     * @property Grid\Column|Collection result
     * @property Grid\Column|Collection email
     * @property Grid\Column|Collection token
     * @property Grid\Column|Collection tokenable_type
     * @property Grid\Column|Collection tokenable_id
     * @property Grid\Column|Collection abilities
     * @property Grid\Column|Collection last_used_at
     * @property Grid\Column|Collection expires_at
     * @property Grid\Column|Collection perm_id
     * @property Grid\Column|Collection sales_id
     * @property Grid\Column|Collection full_name
     * @property Grid\Column|Collection mobile
     * @property Grid\Column|Collection salt
     * @property Grid\Column|Collection last_login
     * @property Grid\Column|Collection login_times
     * @property Grid\Column|Collection balance
     * @property Grid\Column|Collection frozen
     * @property Grid\Column|Collection bank_name
     * @property Grid\Column|Collection account_holder
     * @property Grid\Column|Collection login_id
     * @property Grid\Column|Collection country
     * @property Grid\Column|Collection flag
     * @property Grid\Column|Collection update at
     * @property Grid\Column|Collection channel
     * @property Grid\Column|Collection charge
     *
     * @method Grid\Column|Collection status(string $label = null)
     * @method Grid\Column|Collection id(string $label = null)
     * @method Grid\Column|Collection name(string $label = null)
     * @method Grid\Column|Collection type(string $label = null)
     * @method Grid\Column|Collection version(string $label = null)
     * @method Grid\Column|Collection detail(string $label = null)
     * @method Grid\Column|Collection created_at(string $label = null)
     * @method Grid\Column|Collection updated_at(string $label = null)
     * @method Grid\Column|Collection is_enabled(string $label = null)
     * @method Grid\Column|Collection parent_id(string $label = null)
     * @method Grid\Column|Collection order(string $label = null)
     * @method Grid\Column|Collection icon(string $label = null)
     * @method Grid\Column|Collection uri(string $label = null)
     * @method Grid\Column|Collection extension(string $label = null)
     * @method Grid\Column|Collection permission_id(string $label = null)
     * @method Grid\Column|Collection menu_id(string $label = null)
     * @method Grid\Column|Collection slug(string $label = null)
     * @method Grid\Column|Collection http_method(string $label = null)
     * @method Grid\Column|Collection http_path(string $label = null)
     * @method Grid\Column|Collection role_id(string $label = null)
     * @method Grid\Column|Collection user_id(string $label = null)
     * @method Grid\Column|Collection value(string $label = null)
     * @method Grid\Column|Collection username(string $label = null)
     * @method Grid\Column|Collection password(string $label = null)
     * @method Grid\Column|Collection avatar(string $label = null)
     * @method Grid\Column|Collection remember_token(string $label = null)
     * @method Grid\Column|Collection invitation_code(string $label = null)
     * @method Grid\Column|Collection metro(string $label = null)
     * @method Grid\Column|Collection content(string $label = null)
     * @method Grid\Column|Collection image(string $label = null)
     * @method Grid\Column|Collection image_route(string $label = null)
     * @method Grid\Column|Collection account_name(string $label = null)
     * @method Grid\Column|Collection account_num(string $label = null)
     * @method Grid\Column|Collection ifsc(string $label = null)
     * @method Grid\Column|Collection upi(string $label = null)
     * @method Grid\Column|Collection deleted_at(string $label = null)
     * @method Grid\Column|Collection configs(string $label = null)
     * @method Grid\Column|Collection key(string $label = null)
     * @method Grid\Column|Collection input_type(string $label = null)
     * @method Grid\Column|Collection remark(string $label = null)
     * @method Grid\Column|Collection uuid(string $label = null)
     * @method Grid\Column|Collection connection(string $label = null)
     * @method Grid\Column|Collection queue(string $label = null)
     * @method Grid\Column|Collection payload(string $label = null)
     * @method Grid\Column|Collection exception(string $label = null)
     * @method Grid\Column|Collection failed_at(string $label = null)
     * @method Grid\Column|Collection symbol(string $label = null)
     * @method Grid\Column|Collection period(string $label = null)
     * @method Grid\Column|Collection size(string $label = null)
     * @method Grid\Column|Collection direction(string $label = null)
     * @method Grid\Column|Collection migration(string $label = null)
     * @method Grid\Column|Collection batch(string $label = null)
     * @method Grid\Column|Collection goods_id(string $label = null)
     * @method Grid\Column|Collection order_num(string $label = null)
     * @method Grid\Column|Collection amount(string $label = null)
     * @method Grid\Column|Collection gain(string $label = null)
     * @method Grid\Column|Collection opening(string $label = null)
     * @method Grid\Column|Collection closing(string $label = null)
     * @method Grid\Column|Collection result(string $label = null)
     * @method Grid\Column|Collection email(string $label = null)
     * @method Grid\Column|Collection token(string $label = null)
     * @method Grid\Column|Collection tokenable_type(string $label = null)
     * @method Grid\Column|Collection tokenable_id(string $label = null)
     * @method Grid\Column|Collection abilities(string $label = null)
     * @method Grid\Column|Collection last_used_at(string $label = null)
     * @method Grid\Column|Collection expires_at(string $label = null)
     * @method Grid\Column|Collection perm_id(string $label = null)
     * @method Grid\Column|Collection sales_id(string $label = null)
     * @method Grid\Column|Collection full_name(string $label = null)
     * @method Grid\Column|Collection mobile(string $label = null)
     * @method Grid\Column|Collection salt(string $label = null)
     * @method Grid\Column|Collection last_login(string $label = null)
     * @method Grid\Column|Collection login_times(string $label = null)
     * @method Grid\Column|Collection balance(string $label = null)
     * @method Grid\Column|Collection frozen(string $label = null)
     * @method Grid\Column|Collection bank_name(string $label = null)
     * @method Grid\Column|Collection account_holder(string $label = null)
     * @method Grid\Column|Collection login_id(string $label = null)
     * @method Grid\Column|Collection country(string $label = null)
     * @method Grid\Column|Collection flag(string $label = null)
     * @method Grid\Column|Collection update at(string $label = null)
     * @method Grid\Column|Collection channel(string $label = null)
     * @method Grid\Column|Collection charge(string $label = null)
     */
    class Grid {}

    class MiniGrid extends Grid {}

    /**
     * @property Show\Field|Collection status
     * @property Show\Field|Collection id
     * @property Show\Field|Collection name
     * @property Show\Field|Collection type
     * @property Show\Field|Collection version
     * @property Show\Field|Collection detail
     * @property Show\Field|Collection created_at
     * @property Show\Field|Collection updated_at
     * @property Show\Field|Collection is_enabled
     * @property Show\Field|Collection parent_id
     * @property Show\Field|Collection order
     * @property Show\Field|Collection icon
     * @property Show\Field|Collection uri
     * @property Show\Field|Collection extension
     * @property Show\Field|Collection permission_id
     * @property Show\Field|Collection menu_id
     * @property Show\Field|Collection slug
     * @property Show\Field|Collection http_method
     * @property Show\Field|Collection http_path
     * @property Show\Field|Collection role_id
     * @property Show\Field|Collection user_id
     * @property Show\Field|Collection value
     * @property Show\Field|Collection username
     * @property Show\Field|Collection password
     * @property Show\Field|Collection avatar
     * @property Show\Field|Collection remember_token
     * @property Show\Field|Collection invitation_code
     * @property Show\Field|Collection metro
     * @property Show\Field|Collection content
     * @property Show\Field|Collection image
     * @property Show\Field|Collection image_route
     * @property Show\Field|Collection account_name
     * @property Show\Field|Collection account_num
     * @property Show\Field|Collection ifsc
     * @property Show\Field|Collection upi
     * @property Show\Field|Collection deleted_at
     * @property Show\Field|Collection configs
     * @property Show\Field|Collection key
     * @property Show\Field|Collection input_type
     * @property Show\Field|Collection remark
     * @property Show\Field|Collection uuid
     * @property Show\Field|Collection connection
     * @property Show\Field|Collection queue
     * @property Show\Field|Collection payload
     * @property Show\Field|Collection exception
     * @property Show\Field|Collection failed_at
     * @property Show\Field|Collection symbol
     * @property Show\Field|Collection period
     * @property Show\Field|Collection size
     * @property Show\Field|Collection direction
     * @property Show\Field|Collection migration
     * @property Show\Field|Collection batch
     * @property Show\Field|Collection goods_id
     * @property Show\Field|Collection order_num
     * @property Show\Field|Collection amount
     * @property Show\Field|Collection gain
     * @property Show\Field|Collection opening
     * @property Show\Field|Collection closing
     * @property Show\Field|Collection result
     * @property Show\Field|Collection email
     * @property Show\Field|Collection token
     * @property Show\Field|Collection tokenable_type
     * @property Show\Field|Collection tokenable_id
     * @property Show\Field|Collection abilities
     * @property Show\Field|Collection last_used_at
     * @property Show\Field|Collection expires_at
     * @property Show\Field|Collection perm_id
     * @property Show\Field|Collection sales_id
     * @property Show\Field|Collection full_name
     * @property Show\Field|Collection mobile
     * @property Show\Field|Collection salt
     * @property Show\Field|Collection last_login
     * @property Show\Field|Collection login_times
     * @property Show\Field|Collection balance
     * @property Show\Field|Collection frozen
     * @property Show\Field|Collection bank_name
     * @property Show\Field|Collection account_holder
     * @property Show\Field|Collection login_id
     * @property Show\Field|Collection country
     * @property Show\Field|Collection flag
     * @property Show\Field|Collection update at
     * @property Show\Field|Collection channel
     * @property Show\Field|Collection charge
     *
     * @method Show\Field|Collection status(string $label = null)
     * @method Show\Field|Collection id(string $label = null)
     * @method Show\Field|Collection name(string $label = null)
     * @method Show\Field|Collection type(string $label = null)
     * @method Show\Field|Collection version(string $label = null)
     * @method Show\Field|Collection detail(string $label = null)
     * @method Show\Field|Collection created_at(string $label = null)
     * @method Show\Field|Collection updated_at(string $label = null)
     * @method Show\Field|Collection is_enabled(string $label = null)
     * @method Show\Field|Collection parent_id(string $label = null)
     * @method Show\Field|Collection order(string $label = null)
     * @method Show\Field|Collection icon(string $label = null)
     * @method Show\Field|Collection uri(string $label = null)
     * @method Show\Field|Collection extension(string $label = null)
     * @method Show\Field|Collection permission_id(string $label = null)
     * @method Show\Field|Collection menu_id(string $label = null)
     * @method Show\Field|Collection slug(string $label = null)
     * @method Show\Field|Collection http_method(string $label = null)
     * @method Show\Field|Collection http_path(string $label = null)
     * @method Show\Field|Collection role_id(string $label = null)
     * @method Show\Field|Collection user_id(string $label = null)
     * @method Show\Field|Collection value(string $label = null)
     * @method Show\Field|Collection username(string $label = null)
     * @method Show\Field|Collection password(string $label = null)
     * @method Show\Field|Collection avatar(string $label = null)
     * @method Show\Field|Collection remember_token(string $label = null)
     * @method Show\Field|Collection invitation_code(string $label = null)
     * @method Show\Field|Collection metro(string $label = null)
     * @method Show\Field|Collection content(string $label = null)
     * @method Show\Field|Collection image(string $label = null)
     * @method Show\Field|Collection image_route(string $label = null)
     * @method Show\Field|Collection account_name(string $label = null)
     * @method Show\Field|Collection account_num(string $label = null)
     * @method Show\Field|Collection ifsc(string $label = null)
     * @method Show\Field|Collection upi(string $label = null)
     * @method Show\Field|Collection deleted_at(string $label = null)
     * @method Show\Field|Collection configs(string $label = null)
     * @method Show\Field|Collection key(string $label = null)
     * @method Show\Field|Collection input_type(string $label = null)
     * @method Show\Field|Collection remark(string $label = null)
     * @method Show\Field|Collection uuid(string $label = null)
     * @method Show\Field|Collection connection(string $label = null)
     * @method Show\Field|Collection queue(string $label = null)
     * @method Show\Field|Collection payload(string $label = null)
     * @method Show\Field|Collection exception(string $label = null)
     * @method Show\Field|Collection failed_at(string $label = null)
     * @method Show\Field|Collection symbol(string $label = null)
     * @method Show\Field|Collection period(string $label = null)
     * @method Show\Field|Collection size(string $label = null)
     * @method Show\Field|Collection direction(string $label = null)
     * @method Show\Field|Collection migration(string $label = null)
     * @method Show\Field|Collection batch(string $label = null)
     * @method Show\Field|Collection goods_id(string $label = null)
     * @method Show\Field|Collection order_num(string $label = null)
     * @method Show\Field|Collection amount(string $label = null)
     * @method Show\Field|Collection gain(string $label = null)
     * @method Show\Field|Collection opening(string $label = null)
     * @method Show\Field|Collection closing(string $label = null)
     * @method Show\Field|Collection result(string $label = null)
     * @method Show\Field|Collection email(string $label = null)
     * @method Show\Field|Collection token(string $label = null)
     * @method Show\Field|Collection tokenable_type(string $label = null)
     * @method Show\Field|Collection tokenable_id(string $label = null)
     * @method Show\Field|Collection abilities(string $label = null)
     * @method Show\Field|Collection last_used_at(string $label = null)
     * @method Show\Field|Collection expires_at(string $label = null)
     * @method Show\Field|Collection perm_id(string $label = null)
     * @method Show\Field|Collection sales_id(string $label = null)
     * @method Show\Field|Collection full_name(string $label = null)
     * @method Show\Field|Collection mobile(string $label = null)
     * @method Show\Field|Collection salt(string $label = null)
     * @method Show\Field|Collection last_login(string $label = null)
     * @method Show\Field|Collection login_times(string $label = null)
     * @method Show\Field|Collection balance(string $label = null)
     * @method Show\Field|Collection frozen(string $label = null)
     * @method Show\Field|Collection bank_name(string $label = null)
     * @method Show\Field|Collection account_holder(string $label = null)
     * @method Show\Field|Collection login_id(string $label = null)
     * @method Show\Field|Collection country(string $label = null)
     * @method Show\Field|Collection flag(string $label = null)
     * @method Show\Field|Collection update at(string $label = null)
     * @method Show\Field|Collection channel(string $label = null)
     * @method Show\Field|Collection charge(string $label = null)
     */
    class Show {}

    /**
     
     */
    class Form {}

}

namespace Dcat\Admin\Grid {
    /**
     
     */
    class Column {}

    /**
     
     */
    class Filter {}
}

namespace Dcat\Admin\Show {
    /**
     
     */
    class Field {}
}
