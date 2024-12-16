<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;
use Session;
use Mail;

class ViewBookingController extends Controller
{

    public function view_orders()
    {
        $meta = array(
            'name' => 'view_orders'
        );
        
        $user_number = auth()->guard('web')->user()->phone;
        
        $user = auth()->guard('web')->user()->id;
        
        $user_detail = DB::table('users')->where('id', $user)->first();
        
        
        $orders = DB::table('orders')->where('phone', $user_number)->where('payment_status', 'paid')->get();
    
        
        return view('web.orders')->with(compact('meta','orders','user_detail'));  
    }
    
    
    public function profile($id)
    {
        $meta = array(
            'name' => 'profile'
        );
        
        $user = $id;
        
        $user_detail = DB::table('users')->where('id', $user)->first();
        
        $orders = DB::table('orders')->where('phone', $user_detail->phone)->where('payment_status', 'paid')->get();
    
        
        return view('web.profile')->with(compact('meta','orders','user','user_detail'));  
    }
    
    public function bulk_coupon()
    {
        $codes = ['SIE-USNSJP', 'SIE-DWU4D9', 'SIE-FYERM4', 'SIE-QD63WB', 'SIE-ZAMV6I', 'SIE-S3YR6M', 'SIE-G7F4X1', 'SIE-LM9RZU', 'SIE-IH2USP', 'SIE-F5ERB3', 'SIE-FJB1TG', 'SIE-M4146N', 'SIE-WMNCW2', 'SIE-LC6SCI', 'SIE-FRF9D1', 'SIE-PQX6ZQ', 'SIE-VK56Q1', 'SIE-5CCRJ9', 'SIE-MVJ8PY', 'SIE-7VDJTP', 'SIE-JZB6CC', 'SIE-5X81AS', 'SIE-4SET7G', 'SIE-YB68JR', 'SIE-BFJ5NF', 'SIE-LFJJ8B', 'SIE-WBLYDC', 'SIE-DBU671', 'SIE-6UM5Z5', 'SIE-P6XG9E', 'SIE-8PCWH8', 'SIE-TMEPJD', 'SIE-M3M57Z', 'SIE-CSGVRF', 'SIE-LYDC8L', 'SIE-IYU47V', 'SIE-D6ZN8C', 'SIE-9JTFZW', 'SIE-7C42W6', 'SIE-96M8RA', 'SIE-47RF8P', 'SIE-6GD5MC', 'SIE-EQZU1G', 'SIE-W5B5YT', 'SIE-UNYKYQ', 'SIE-7YIDB8', 'SIE-735S5P', 'SIE-QUVR38', 'SIE-ZDFUMI', 'SIE-9UDDHW', 'SIE-5PG4BK', 'SIE-8Q6PX9', 'SIE-63NG8N', 'SIE-LGLR5R', 'SIE-741RF8', 'SIE-BBYSNG', 'SIE-ACDXFG', 'SIE-QMLQ4K', 'SIE-TQ2KPY', 'SIE-DSQM9M', 'SIE-8L5AD3', 'SIE-LIR2QU', 'SIE-X26X7R', 'SIE-AKPVPW', 'SIE-F68F2X', 'SIE-3YMZCH', 'SIE-B2TTJD', 'SIE-X3A2UL', 'SIE-SACWJU', 'SIE-EZGBAN', 'SIE-XC95HH', 'SIE-1ZY7F6', 'SIE-SUE47W', 'SIE-GHDAVQ', 'SIE-P36DJ5', 'SIE-52E1JU', 'SIE-U8LYVJ', 'SIE-UDTL4E', 'SIE-HXV4JV', 'SIE-YKARV4', 'SIE-HWH7SM', 'SIE-4RU6K5', 'SIE-4G4IBZ', 'SIE-S5T54U', 'SIE-XPYHIW', 'SIE-6HCBPZ', 'SIE-HTJBN9', 'SIE-FMGAB2', 'SIE-ZJ9WK7', 'SIE-YIHURG', 'SIE-ISJZBZ', 'SIE-B67KW2', 'SIE-I1QPSN', 'SIE-2UI2P6', 'SIE-ZWID3C', 'SIE-AYW83S', 'SIE-4NEP15', 'SIE-EL3GRG', 'SIE-AULQNY', 'SIE-CSNNAY', 'SIE-DP4F2K', 'SIE-PALXVZ', 'SIE-8IGQKY', 'SIE-SBDH13', 'SIE-TE5TN6', 'SIE-SQAY2K', 'SIE-EV4M3J', 'SIE-B56A86', 'SIE-X46DIB', 'SIE-WLEWUJ', 'SIE-KDFANK', 'SIE-A5HWUP', 'SIE-Z221SQ', 'SIE-E493CF', 'SIE-HPV63R', 'SIE-8AY69R', 'SIE-1JDMJQ', 'SIE-H68ZKL', 'SIE-FPHQ2W', 'SIE-URQSMQ', 'SIE-26Y8J6', 'SIE-W98P3U', 'SIE-4NDTBH', 'SIE-P9CAH5', 'SIE-ZXUBLM', 'SIE-ACKZGD', 'SIE-4TZWW2', 'SIE-WQPWQH', 'SIE-JIH8QI', 'SIE-DB9D15', 'SIE-A5LI4H', 'SIE-96EM9Z', 'SIE-P874B1', 'SIE-4M1DYV', 'SIE-KCWA7Q', 'SIE-AW1I29', 'SIE-QWHDG3', 'SIE-I6GC8P', 'SIE-FH6VN2', 'SIE-YTGNPZ', 'SIE-ZSQKST', 'SIE-J24R5L', 'SIE-QE817T', 'SIE-SENP87', 'SIE-RT82ST', 'SIE-TCCVFA', 'SIE-JZSLPX', 'SIE-3VAIHD', 'SIE-QUB2N8', 'SIE-VB5HIK', 'SIE-YLM89G', 'SIE-D8HSKB', 'SIE-861YVV', 'SIE-VE1VEQ', 'SIE-HLV687', 'SIE-SX2LZB', 'SIE-JGSP8J', 'SIE-82J42W', 'SIE-MD4E3P', 'SIE-SET33N', 'SIE-RU7MYJ', 'SIE-W8GF1K', 'SIE-SKGH54', 'SIE-2M59KX', 'SIE-TRRFVL', 'SIE-INPI6N', 'SIE-59NZ6C', 'SIE-4BZ3AA', 'SIE-6DU7GR', 'SIE-2N27S3', 'SIE-661ESV', 'SIE-LA6J8H', 'SIE-839IYC', 'SIE-GW7UNA', 'SIE-QUB69C', 'SIE-W6SL3L', 'SIE-7TBH1A', 'SIE-TGZIVF', 'SIE-75Y3TV', 'SIE-CHPPSJ', 'SIE-EHNR4T', 'SIE-U5U7MH', 'SIE-2MJQAT', 'SIE-PW6A9V', 'SIE-EWBBJL', 'SIE-5ZRUD8', 'SIE-23SK31', 'SIE-TUZ1XT', 'SIE-4WVALQ', 'SIE-N5S6DV', 'SIE-NAYAJA', 'SIE-M63TAI', 'SIE-HRI2VD', 'SIE-CAXC5M', 'SIE-LIL85P', 'SIE-H3JM9K', 'SIE-VECHLM', 'SIE-69ELNU', 'SIE-REBGZ2', 'SIE-IADIZX', 'SIE-TB9ZZL', 'SIE-YXH4IV', 'SIE-F58CYM', 'SIE-Z43MAH', 'SIE-MZ4UWY', 'SIE-K11XBS', 'SIE-XS4KLQ', 'SIE-3BZI73', 'SIE-UGKL9I', 'SIE-22Z5HD', 'SIE-69DZUR', 'SIE-A5YFT1', 'SIE-XAI9KT', 'SIE-AYIP43', 'SIE-9HFTYC', 'SIE-B7YCZK', 'SIE-IQ4HV2', 'SIE-ECUUJ8', 'SIE-9DNNYJ', 'SIE-PGK2YC', 'SIE-HEHTDH', 'SIE-LY5E2P', 'SIE-UQZA1K', 'SIE-IKT39R', 'SIE-YQ2K4U', 'SIE-D19CV3', 'SIE-4VC157', 'SIE-JWQBL6', 'SIE-7DCM8F', 'SIE-A2BY23', 'SIE-JL2Q6Q', 'SIE-3N78LX', 'SIE-DWYKQ5', 'SIE-YVD2SE', 'SIE-SMBKMN', 'SIE-XPTTL3', 'SIE-1A4H5J', 'SIE-SIYC55', 'SIE-6JFGVC', 'SIE-BM54KX', 'SIE-VF3DML', 'SIE-KR446A', 'SIE-GANFZY', 'SIE-3C1S6N', 'SIE-YHJ8QB', 'SIE-T665I2', 'SIE-9GFUQ5', 'SIE-U4ISQ8', 'SIE-D8SLCA', 'SIE-723H3C', 'SIE-YIPBL6', 'SIE-5ZYG32', 'SIE-6G5A8J', 'SIE-LQYWN8', 'SIE-ZNPCZT', 'SIE-2G23X5', 'SIE-E5LPMN', 'SIE-4VYYHG', 'SIE-SRXJZ6', 'SIE-64G52Y', 'SIE-IAMWY3', 'SIE-IBW3HY', 'SIE-PL2ID2', 'SIE-HUKLPX', 'SIE-XE2DCE', 'SIE-XC9RJR', 'SIE-5LE7DR', 'SIE-SS6NC8', 'SIE-7FBAT5', 'SIE-E6E42U', 'SIE-21T899', 'SIE-UX3WEA', 'SIE-MDXE9T', 'SIE-ABH6DW', 'SIE-G22F5Y', 'SIE-PK83LH', 'SIE-KJULSL', 'SIE-XT6LIJ', 'SIE-FHDNRZ', 'SIE-A848QX', 'SIE-T2I8MW', 'SIE-E22R7G', 'SIE-U5HRA5', 'SIE-23AIFX', 'SIE-L48RCA', 'SIE-7H74QJ', 'SIE-H6IMKZ', 'SIE-3B1HJA', 'SIE-BJS528', 'SIE-JLPCHI', 'SIE-5KCN4L', 'SIE-BJSEG9', 'SIE-MHNWDQ', 'SIE-89JXM2', 'SIE-F69637', 'SIE-X33BWQ', 'SIE-YSSY74', 'SIE-ES1KZS', 'SIE-IS4ABK', 'SIE-868N8M', 'SIE-MEKDKY', 'SIE-J4J79S', 'SIE-LL4RAA', 'SIE-QX91B4', 'SIE-DG2B4Y', 'SIE-ZWX4SG', 'SIE-Y9R7WH', 'SIE-XXU3XD', 'SIE-TGZB1H', 'SIE-77LPT2', 'SIE-3I4C6V', 'SIE-GCV7DS', 'SIE-66VJG9', 'SIE-JKA1AH', 'SIE-8LXDYF', 'SIE-Y542PW', 'SIE-K9N3TB', 'SIE-UUGHJQ', 'SIE-M689K1', 'SIE-E98TN8', 'SIE-3ZX4JL', 'SIE-N44B4G', 'SIE-UNW4HH', 'SIE-Y6ET7A', 'SIE-76KKAR', 'SIE-NDM5JS', 'SIE-RH74HF', 'SIE-R2XZF1', 'SIE-S4DX3J', 'SIE-CQXR27', 'SIE-XYMKHM', 'SIE-2GJEI2', 'SIE-6RMQ67', 'SIE-3QEM9D', 'SIE-U1HAUT', 'SIE-CIDIUW', 'SIE-BWA6NN', 'SIE-PS5NNZ', 'SIE-1HMX5C', 'SIE-U4LQ5N', 'SIE-MLWAG2', 'SIE-H8QYBB', 'SIE-2NZ6F7', 'SIE-I92SAC', 'SIE-YW4YXI', 'SIE-A5CI6S', 'SIE-D5V48Z', 'SIE-MEZC24', 'SIE-3Q36F2', 'SIE-6B3FBG', 'SIE-EQNMJ4', 'SIE-T4AR1F', 'SIE-G9HIS9', 'SIE-B3WJ5L', 'SIE-7Q15TR', 'SIE-R881PH', 'SIE-LGBBSR', 'SIE-2M1BSI', 'SIE-TXXX8J', 'SIE-RK2S8R', 'SIE-ACKF7B', 'SIE-B2BYM9', 'SIE-BIXD1D', 'SIE-UHGQWK', 'SIE-YZPTDL', 'SIE-FA85NV', 'SIE-JCNJZS', 'SIE-J3EEZ6', 'SIE-X9UXBX', 'SIE-7495Y3', 'SIE-PY7HC6', 'SIE-MZPB89', 'SIE-N1I4RJ', 'SIE-IRHV24', 'SIE-VYX7BF', 'SIE-QPA2DP', 'SIE-2WMN5M', 'SIE-CRTGPL', 'SIE-5K5E5Z', 'SIE-S8S1BR', 'SIE-QN7J8A', 'SIE-EQUDVH', 'SIE-Q9SIRN', 'SIE-NX62Y5', 'SIE-7C7PUE', 'SIE-VZ3KP1', 'SIE-9CRG5X', 'SIE-HWN62N', 'SIE-6WH3I6', 'SIE-8EXSX3', 'SIE-RLIQ9Y', 'SIE-BS9ZM1', 'SIE-1L1TID', 'SIE-DWX8IL', 'SIE-B9P5ST', 'SIE-LAQFS7', 'SIE-EUU6B7', 'SIE-UJE9EE', 'SIE-YFTZ7B', 'SIE-UDMQ6V', 'SIE-EWR7NT', 'SIE-6HIM16', 'SIE-FFD6VY', 'SIE-8XEHF1', 'SIE-WAP9BQ', 'SIE-TIA9IR', 'SIE-1CUZ2W', 'SIE-EN3VQL', 'SIE-RVI7SJ', 'SIE-74HGDH', 'SIE-U53CGQ', 'SIE-RM5XFF', 'SIE-NUZ6P1', 'SIE-MMTDY7', 'SIE-KZ5RWE', 'SIE-UT3Z6T', 'SIE-24KKZM', 'SIE-1AEJ73', 'SIE-2SMRHU', 'SIE-1RXFTT', 'SIE-MXE5ZG', 'SIE-I6NV7N', 'SIE-NZQ7IV', 'SIE-AL9J6G', 'SIE-LRLM2L', 'SIE-86UYY4', 'SIE-ZWQ77B', 'SIE-49MQUL', 'SIE-DX4VU6', 'SIE-6DPAYS', 'SIE-LVNV6H', 'SIE-S7CWZ8', 'SIE-P8VVVK', 'SIE-3EFCL6', 'SIE-SSFZ1G', 'SIE-T3CM78', 'SIE-472VH8', 'SIE-8DZAF9', 'SIE-VLZZQ9', 'SIE-TX448H', 'SIE-FC9E1W', 'SIE-AM718S', 'SIE-111ZIH', 'SIE-LFX3CR', 'SIE-Q6ZFLC', 'SIE-T9HQCS', 'SIE-1QJ5E8', 'SIE-GYKBHH', 'SIE-Q4U21D', 'SIE-B38SVJ', 'SIE-JVW34A', 'SIE-XT9Q3G', 'SIE-766KEP', 'SIE-YYA2MJ', 'SIE-HQ4LWD', 'SIE-8Z2N7J', 'SIE-ZTY5XT', 'SIE-UUG4JI', 'SIE-LQTYGV', 'SIE-H3PX4Q', 'SIE-Y2HMEQ', 'SIE-G3CR9I', 'SIE-MA2M81', 'SIE-LKHRKM', 'SIE-JC2RW6', 'SIE-GTISG9', 'SIE-MT2RUZ', 'SIE-TWWVZV', 'SIE-TNYACE', 'SIE-HVT2MD', 'SIE-CAL7JI', 'SIE-71P9EH', 'SIE-B2Y6ME', 'SIE-K4DL1W', 'SIE-PU5L8T', 'SIE-5CB1ZD', 'SIE-LD6T99', 'SIE-2P7Y7A', 'SIE-JBDRHR', 'SIE-AAKZWV', 'SIE-74LY1A', 'SIE-9YANZG', 'SIE-SX4HFA', 'SIE-4MPEIC', 'SIE-4EK27N', 'SIE-R25CS5', 'SIE-EMWDPR', 'SIE-1HZFGA', 'SIE-YJU68R', 'SIE-24CTC1', 'SIE-5CB2BA', 'SIE-FL5D8S', 'SIE-RG35C2', 'SIE-DGI5SR', 'SIE-RAXSTM', 'SIE-YBMSR7', 'SIE-T7TWU2', 'SIE-5BF2P7', 'SIE-LB9LG5', 'SIE-GV5SI9'];
        
        foreach ($codes as $code) {
            $values = ['code' => $code, 'created_at' => now()];
            $log = DB::table('coupons')->insert($values);
        }
    
        echo "Done";
    }


}