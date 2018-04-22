<?php

namespace common\models;

use Yii;
use common\models\db\Profile;
use common\models\db\Education;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property int $confirmed_at
 * @property string $unconfirmed_email
 * @property int $blocked_at
 * @property string $registration_ip
 * @property int $created_at
 * @property int $updated_at
 * @property int $flags
 * @property int $last_login_at
 *
 * @property Avatar[] $avatars
 * @property CommentLikes[] $commentLikes
 * @property PostComments[] $comments
 * @property Education[] $educations
 * @property HigherEducation[] $higherEducations
 * @property MiddleEducation[] $middleEducations
 * @property PostComments[] $postComments
 * @property PostFavourites[] $postFavourites
 * @property Post[] $posts
 * @property PostLikes[] $postLikes
 * @property Post[] $posts0
 * @property PostViews[] $postViews
 * @property Profile $profile
 * @property Question[] $questions
 * @property SocialAccount[] $socialAccounts
 * @property Token[] $tokens
 */
class User extends \dektrium\user\models\User
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password_hash', 'auth_key', 'created_at', 'updated_at'], 'required'],
            [['confirmed_at', 'blocked_at', 'created_at', 'updated_at', 'flags', 'last_login_at'], 'integer'],
            [['username', 'email', 'unconfirmed_email'], 'string', 'max' => 255],
            [['password_hash'], 'string', 'max' => 60],
            [['auth_key'], 'string', 'max' => 32],
            [['registration_ip'], 'string', 'max' => 45],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'confirmed_at' => Yii::t('app', 'Confirmed At'),
            'unconfirmed_email' => Yii::t('app', 'Unconfirmed Email'),
            'blocked_at' => Yii::t('app', 'Blocked At'),
            'registration_ip' => Yii::t('app', 'Registration Ip'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'flags' => Yii::t('app', 'Flags'),
            'last_login_at' => Yii::t('app', 'Last Login At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentLikes()
    {
        return $this->hasMany(CommentLikes::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(PostComments::className(), ['id' => 'comment_id'])->viaTable('comment_likes', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHigherEducations()
    {
        return $this->hasMany(HigherEducation::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMiddleEducations()
    {
        return $this->hasMany(MiddleEducation::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostComments()
    {
        return $this->hasMany(PostComments::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostFavourites()
    {
        return $this->hasMany(PostFavourites::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])->viaTable('post_favourites', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostLikes()
    {
        return $this->hasMany(PostLikes::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts0()
    {
        return $this->hasMany(Post::className(), ['id' => 'post_id'])->viaTable('post_likes', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostViews()
    {
        return $this->hasMany(PostViews::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialAccounts()
    {
        return $this->hasMany(SocialAccount::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTokens()
    {
        return $this->hasMany(Token::className(), ['user_id' => 'id']);
    }

    /**
     * @return int
     */
    public static function findGuestId()
    {
        return self::findOne(['username' => 'guest'])->id;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvatars()
    {
        return $this->hasMany(Avatar::className(), ['user_id' => 'id']);
    }
}
